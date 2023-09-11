@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} id="message"  {!! $attributes->merge(['class' => 'block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm', 'rows' => '4']) !!} >{{ $slot }}</textarea>



