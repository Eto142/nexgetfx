@include('admin.header')

<div class="container" style="max-width: 700px; margin: 40px auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2 style="margin-bottom: 20px; font-size: 22px; font-weight: bold; color: #333;">Send Email (Admin)</h2>

    {{-- Success / Error Messages --}}
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Email Form --}}
    <form action="{{ route('admin.send.email.post') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf

        <div>
            <label style="font-weight: bold;">Recipient Email</label>
            <input type="email" name="to" value="{{ old('to') }}" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('to')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label style="font-weight: bold;">Subject</label>
            <input type="text" name="subject" value="{{ old('subject') }}" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('subject')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label style="font-weight: bold;">Message</label>
            <textarea name="message" rows="6" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; resize: vertical;">{{ old('message') }}</textarea>
            @error('message')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" 
            style="background: #28a745; color: white; padding: 12px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
            Send Email
        </button>
    </form>
</div>

@include('admin.footer')
