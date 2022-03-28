<div>
    <h6>this is a my component from livewire</h6>
    <button wire:click="increment">+</button>
    <h1>Total: {{ $counter }}</h1>

    <div>
        <input type="text" wire:model="input">
        <p>Text Output: {{ $input }}</p>
    </div>
</div>
