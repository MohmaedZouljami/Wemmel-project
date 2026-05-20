@props([
    'label',
    'name',
    'required' => (boolean) false,
    'placeholder' => null,
    'value' => null,

])
<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <input
        type="text"
        name="{{$name}}"
        @if($placeholder) placeholder="{{$placeholder}}"@endif
        class="form-control"
        @if($required) required @endif
        value="{{old($name, $value)}}"
    >
</div>
@error($name)
<p class="text-sm text-red-600"> {{$message}} </p>
@enderror
