<div class="flex flex-col space-y-1">
    <label for="all">
        <input type="radio" name="{{ $name }}" id="all" value="" {{ request($name) === null ? 'checked' : '' }}>
        All
    </label>

    @foreach ($options as $value => $label)
         <label for="{{ $value }}">
            <input type="radio" name="{{ $name }}" id="{{ $value }}" value="{{ $value }}" {{ request($name) === $value ? 'checked' : '' }}>
            {{ $label }}
        </label>
    @endforeach
</div>