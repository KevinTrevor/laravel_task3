<div class="md:container md:mx-auto">
<form class="w-full max-w-sm" wire:submit="save">
    <div class="flex items-center border-b border-indigo-500 py-2">
      <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Product name" aria-label="Product" wire:model="name">
      <button class="flex-shrink-0 bg-indigo-500 hover:bg-indigo-700 border-indigo-500 hover:border-indigo-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
        Create
      </button>
    </div>
  </form>
</div>