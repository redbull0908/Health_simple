<x-moonshine::box
        title="#{{ $item->getKey() }}"
>
    <table class="table">
        @foreach($resource->getFields()->detailFields() as $index => $field)
            <tr>
                <th width="15%">
                    {{$field->label()}}
                </th>
                <td>{!! $field->isSee($item) ? $field->indexViewValue($item): '' !!}</td>
            </tr>
        @endforeach
    </table>
</x-moonshine::box>

@if(!$resource->isPreviewMode())
    @include("moonshine::crud.shared.detail-card-actions", ["item" => $item, "resource" => $resource])
@endif

@foreach($resource->getFields()->relatable() as $field)
    @if($field->canDisplayOnForm($item))
        {{ $resource->renderComponent($field, $item) }}
    @endif
@endforeach
