<div class="password-request-box">
    <h2>Reset Password</h2>

    <!-- Form untuk meminta reset password -->
    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="input-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="text" name="telepon" id="telepon" placeholder="Masukkan nomor telepon Anda" required>
        </div>

        <button type="submit">Kirim Link Reset Password</button>
    </form>

    <!-- Menampilkan pesan error jika ada -->
    @if(session('status'))
        <div class="success-message">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>