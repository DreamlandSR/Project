<form method="POST" action="{{ route('otp.verify') }}">
    @csrf
    <input type="hidden" name="email" value="{{ request('email') }}">

    <label>Masukkan Kode OTP:</label>
    <input type="text" name="otp" required>

    @error('otp')
        <span>{{ $message }}</span>
    @enderror

    <button type="submit">Kirim</button>
</form>
