<div class="login-box">
    <h2>Setel Ulang Password</h2>
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="input-group">
            <label for="telepon">Telepon</label>
            <input type="telepon" id="telepon" name="telepon" placeholder="Nomor Telepon" value="{{ old('telepon') }}" required>
        </div>

        <div class="input-group">
            <label for="password">Password Baru</label>
            <input type="password" id="password" name="password" placeholder="Password Baru" required>
        </div>

        <div class="input-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
        </div>

        <button type="submit" class="submit-btn">Reset Password</button>
    </form>
</div>