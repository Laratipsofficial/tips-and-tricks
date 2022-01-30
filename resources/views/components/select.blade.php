@props(['disabled' => false, 'items', 'itemKey' => 'id', 'itemValue' => 'name'])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full']) !!}>
    <option value="">Select</option>
    @foreach ($items as $item)
        <option value="{{ $item[$itemKey] }}">{{ $item[$itemValue] }}</option>
    @endforeach
</select>
