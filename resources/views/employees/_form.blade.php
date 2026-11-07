@php $emp = $employee ?? new \App\Models\Employee; @endphp

<div class="grid md:grid-cols-2 gap-4">

    <div>
        <label class="block text-sm font-medium mb-1">Name *</label>
        <input type="text" name="name" value="{{ old('name', $emp->name) }}"
               class="w-full border rounded px-3 py-2">
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Email *</label>
        <input type="email" name="email" value="{{ old('email', $emp->email) }}"
               class="w-full border rounded px-3 py-2">
        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Phone Number *</label>
        <input type="text" name="phone" value="{{ old('phone', $emp->phone) }}"
               placeholder="10 digits" class="w-full border rounded px-3 py-2">
        @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Date of Birth *</label>
        <input type="date" name="dob"
               value="{{ old('dob', $emp->dob?->format('Y-m-d')) }}"
               max="{{ date('Y-m-d') }}" class="w-full border rounded px-3 py-2">
        @error('dob') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Gender *</label>
        <div class="flex gap-5 py-2">
            @foreach(['Male', 'Female', 'Other'] as $g)
                <label class="flex items-center gap-1">
                    <input type="radio" name="gender" value="{{ $g }}"
                           {{ old('gender', $emp->gender) == $g ? 'checked' : '' }}>
                    {{ $g }}
                </label>
            @endforeach
        </div>
        @error('gender') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Department *</label>
        <select name="department_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Select Department --</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}"
                    {{ old('department_id', $emp->department_id) == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>
        @error('department_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Address *</label>
        <textarea name="address" rows="3"
                  class="w-full border rounded px-3 py-2">{{ old('address', $emp->address) }}</textarea>
        @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Profile Photo (jpg/png, max 2MB)</label>
        @if($emp->photo)
            <img src="{{ asset('storage/' . $emp->photo) }}"
                 class="w-20 h-20 rounded-full object-cover mb-2">
        @endif
        <input type="file" name="photo" accept="image/*">
        @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

</div>