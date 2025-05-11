<form method="POST" action="{{ route('otp.send') }}">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>
    <button type="submit">Kirim OTP</button>
</form>
