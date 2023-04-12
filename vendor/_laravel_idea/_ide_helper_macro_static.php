<?php //2db5f3237f152080ffbcbf63ee32339b
/** @noinspection all */

namespace Illuminate\Database\Eloquent {

    use Illuminate\Support\HigherOrderTapProxy;

    /**
     * @method static $this onlyTrashed()
     * @method static int restore()
     * @method static $this|Model|HigherOrderTapProxy|mixed restoreOrCreate(array $attributes = [], array $values = [])
     * @method static $this withTrashed($withTrashed = true)
     * @method static $this withoutTrashed()
     */
    class Builder {}
}

namespace Illuminate\Http {

    /**
     * @method static bool hasValidRelativeSignature()
     * @method static bool hasValidSignature($absolute = true)
     * @method static bool hasValidSignatureWhileIgnoring($ignoreQuery = [], $absolute = true)
     * @method static array validate(array $rules, ...$params)
     * @method static array validateWithBag(string $errorBag, array $rules, ...$params)
     */
    class Request {}
}
