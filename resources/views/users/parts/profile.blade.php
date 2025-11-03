<div class="card">
    <form action="{{ route('users.updateProfile', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">Profile</div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" id="" class="form-control @error('type') is-invalid @enderror" >
                    @foreach (['PJ', 'PF'] as $type)
                        <option value="{{ $type }}" @selected(old('type') === $type || $user?->profile?->type === $type)>{{ $type }}</option>
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input 
                    value="{{ old('address') ?? $user?->profile?->address}}" 
                    type="text" 
                    class="form-control @error('address') is-invalid @enderror" 
                    name="address"
                >
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>

    
    
    