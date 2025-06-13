<div class="modal-box">
    <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>

    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>


    <h3 class="pb-3 text-lg font-bold">Login</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-control mb-4">
            <legend class="fieldset-legend text-sm">Email</legend>
            <label class="input validator w-full border border-gray-500 rounded-full">
                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                        stroke="currentColor">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </g>
                </svg>
                <input type="email" name="email" placeholder="youremail@gmail.com" required />
            </label>
            <div class="validator-hint hidden">Enter valid email address</div>
        </div>

        <div class="form-control mb-4">
            <legend class="fieldset-legend text-sm">Password</legend>
            <label class="input validator w-full border border-gray-500 rounded-full">
                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                        stroke="currentColor">
                        <path
                            d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                        </path>
                        <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                    </g>
                </svg>
                <input type="password" name="password" class="password-input" required placeholder="Password"
                    minlength="7" {{-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" --}} {{-- title="Must be more than 8 characters, including number, lowercase letter, uppercase letter"  --}} />

                <!-- Tombol show/hide password -->
                <button type="button" class="toggle-password"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600">
                    <img src="{{ asset('images/eye-fill.svg') }}" alt="">
                </button>
            </label>
        </div>

        <div class="modal-action">
            <button type="submit" class="btn w-full bg-black text-white">Login</button>
        </div>
    </form>

</div>

<script>
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPassword = document.getElementById('confirmPasswordInput');

    document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;

            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword ?
                `<img src="{{ asset('images/eye-slash-fill.svg') }}" alt="">` :
                `<img src="{{ asset('images/eye-fill.svg') }}" alt="">`;
        });
    });

    toggleConfirmPassword.addEventListener('click', function(e) {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);

        if (type === 'password') {
            toggleConfirmPassword.innerHTML = `<img src="{{ asset('images/eye-fill.svg') }}" alt="">`;
        } else {
            toggleConfirmPassword.innerHTML =
                `<img src="{{ asset('images/eye-slash-fill.svg') }}" alt="">`;
        }
    });
</script>
