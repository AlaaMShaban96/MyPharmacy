<div style="text-align: center" >
    {{-- Be like water. --}}
    
    <h1>welcome</h1>
    <div class="container">
        <form wire:submit.prevent="saveUser">
            <div class="form-group row">
                <label for="name" class="col-sm-1-12 col-form-label">name</label>
                @error('user.name') <span class="error">{{ $message }}</span> @enderror
                <div class="col-sm-1-12">
                    <input type="text" class="form-control" wire:model.lazy="user.name" name="name" id="name" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-1-12 col-form-label">password</label>
                @error('user.password') <span class="error">{{ $message }}</span> @enderror
                <div class="col-sm-1-12">
                    <input type="password" class="form-control" wire:model="user.password" name="password" id="password" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-1-12 col-form-label">email</label>
                @error('user.email') <span class="error">{{ $message }}</span> @enderror

                <div class="col-sm-1-12">
                    <input type="email" class="form-control" wire:model="user.email" name="email" id="email" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-1-12 col-form-label">phone</label>
                @error('user.phone') <span class="error">{{ $message }}</span> @enderror

                <div class="col-sm-1-12">
                    <input type="number" class="form-control" wire:model="user.phone" name="phone" id="phone" placeholder="">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    {{-- <input type="button" wire:click="getOrders" value="add">
    <input type="button" wire:click="clear" value="clear"> --}}
    @if ($users !=null)
        @foreach ($users as $user)
            <h6>{{$user->name}}</h6> 
            <label wire:click='delete({{$user->id}})'>x</label>

        @endforeach
    @endif
    {{$users->links()}}
</div>
<a href="{{url('/login')}}">go to login</a>
