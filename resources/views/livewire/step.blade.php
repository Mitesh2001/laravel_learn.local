<div>
    <div class="d-flex justify-content-center">
        <p>Create steps if required</p>
        <span wire:click="increment" class="fa fa-plus text-secondary mx-3 my-1"></span>
    </div>
    @foreach($steps as $index => $step)
    <div class="d-flex justify-content-center" wire:key="{{$step}}">
        <input type="text" name="step[]" placeholder="{{'Describe step '.($step+1)}}" class="form-group">
        <span wire:click="remove({{$step}})" class="fa fa-times text-danger mx-3 my-1"></span>
    </div>
    @endforeach
</div>
