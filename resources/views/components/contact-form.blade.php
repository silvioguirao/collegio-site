@props(['action' => route('contact.store')])
<form method="POST" action="{{ $action }}" class="space-y-4" novalidate>
    @csrf
    <input type="text" name="hp" class="hidden" aria-hidden="true">

    <div>
        <label for="name" class="block text-sm font-medium">Nome</label>
        <input id="name" name="name" value="{{ old('name') }}" required aria-required="true" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" class="mt-1 block w-full border rounded-md p-2 focus:ring focus:ring-blue-200" />
        @error('name') <p class="text-sm text-red-600" role="alert">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-medium">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required aria-required="true" aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}" class="mt-1 block w-full border rounded-md p-2 focus:ring focus:ring-blue-200" />
        @error('email') <p class="text-sm text-red-600" role="alert">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="phone" class="block text-sm font-medium">Telefone</label>
        <input id="phone" name="phone" value="{{ old('phone') }}" class="mt-1 block w-full border rounded-md p-2 focus:ring focus:ring-blue-200" />
        @error('phone') <p class="text-sm text-red-600" role="alert">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="subject" class="block text-sm font-medium">Assunto</label>
        <input id="subject" name="subject" value="{{ old('subject') }}" required class="mt-1 block w-full border rounded-md p-2 focus:ring focus:ring-blue-200" />
        @error('subject') <p class="text-sm text-red-600" role="alert">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="message" class="block text-sm font-medium">Mensagem</label>
        <textarea id="message" name="message" rows="5" required class="mt-1 block w-full border rounded-md p-2 focus:ring focus:ring-blue-200">{{ old('message') }}</textarea>
        @error('message') <p class="text-sm text-red-600" role="alert">{{ $message }}</p> @enderror
    </div>

    <div>
        <x-button type="submit">Enviar mensagem</x-button>
    </div>
</form>
