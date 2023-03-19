<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Address') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Please provide a valid address, this will be used for delivery.') }}
        </p>
    </header>

    <form method="post" action="{{ route('address.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="address_line_1" :value="__('Address line')" />
            <x-text-input id="address_line_1" class="block mt-1 w-full" type="text" name="address_line_1" :value="auth()->user()->address_line_1" />
            <x-input-error :messages="$errors->get('address_line_1')" class="mt-2" />

        </div>

        <div>
            <x-input-label for="address_line_2" :value="__('Address line 2 (Optional)')" />
            <x-text-input id="address_line_2" class="block mt-1 w-full" type="text" name="address_line_2" :value="auth()->user()->address_line_2" />
            <x-input-error :messages="$errors->get('address_line_2')" class="mt-2" />
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="auth()->user()->city" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="contact" :value="__('Contact #')" />
                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="auth()->user()->contact" placeholder="09XXXXXXXXX"/>
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>

            <div class="col-span-2">
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="auth()->user()->state" />
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="zip" :value="__('Zip')" />
                <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="auth()->user()->zip" />
                <x-input-error :messages="$errors->get('zip')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>

    </form>
</section>
