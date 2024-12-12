<div class="login-box">
    <h2>Reset Password</h2>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="telepon">Telepon</label>
            <input type="telepon" id="telepon" name="telepon" placeholder="Masukkan nomor telepon Anda" required>
        </div>
        <button type="submit" class="submit-btn">Kirim Link Reset Password</button>

        @if(session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif
    </form>
</div>