<div>
    <div class="d-flex justify-content-center">
        <p>Create steps if required</p>
        <span wire:click="increment" class="fa fa-plus text-secondary mx-3 my-1"></span>
    </div>
    @foreach($steps as $index => $step)
    <div class="d-flex justify-content-center" wire:key="{{$index}}">
        <input type="text" name="stepName[]" placeholder="{{'Describe step '.($index+1)}}" class="form-group" value="{{$step['name']}}">
        <input type="hidden" name="stepId[]" value="{{$step['id']}}">
        <span wire:click="remove({{$index}})" class="fa fa-times text-danger mx-3 my-1"></span>
    </div>
    @endforeach
</div>
