<div>
    <div class="d-flex justify-content-center mb-3">
        <p>Add steps if required</p>
        <span wire:click="increment" class="fa fa-plus-circle text-secondary mx-3 my-1" aria-hidden="true"></span>
    </div>
    <!-- @for($i=0; $i<$steps; $i++) -->
    <div class="my-1">
        <input type="text" name="step" class="form-group" placeholder="{{'Describe step '.($i+1)}}">
        <span wire:click="remove" class="fa fa-times text-danger p-2"></span>
    </div>
    <!-- @endfor -->
</div>
