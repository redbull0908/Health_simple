<?php //230b95b0008f6b7d36bbbef5795243e4
/** @noinspection all */

namespace Illuminate\Database\Eloquent {

    use Illuminate\Support\HigherOrderTapProxy;

    /**
     * @method $this onlyTrashed()
     * @method int restore()
     * @method $this|Model|HigherOrderTapProxy|mixed restoreOrCreate(array $attributes = [], array $values = [])
     * @method $this withTrashed($withTrashed = true)
     * @method $this withoutTrashed()
     */
    class Builder {}
}

namespace Illuminate\Http {

    /**
     * @method bool hasValidRelativeSignature()
     * @method bool hasValidSignature($absolute = true)
     * @method bool hasValidSignatureWhileIgnoring($ignoreQuery = [], $absolute = true)
     * @method array validate(array $rules, ...$params)
     * @method array validateWithBag(string $errorBag, array $rules, ...$params)
     */
    class Request {}
}
