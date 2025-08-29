<td>
    <div {{ $attributes->merge(['class' => 'avatar']) }}>
        <div class="rounded-full">
            <img src="{{ $slot }}" />
        </div>
    </div>
</td>
