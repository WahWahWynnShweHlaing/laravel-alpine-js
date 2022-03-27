<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alpine Js</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<style>
    [x-cloak] {
        display: none;
    }

    .duration-300 {
        transition-duration: 300ms;
    }

    .ease-in {
        transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
    }

    .ease-out {
        transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }

    .scale-90 {
        transform: scale(.9);
    }

    .scale-100 {
        transform: scale(1);
    }
</style>
<body>

    <div class="container-fluid mt-5" x-data="BookCrud">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        Book Table
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody x-init="books()">
                                <template x-for="data in form" :key="data.id">
                                    <tr>
                                        <td x-text="data.id"></td>
                                        <td x-text="data.name"></td>
                                        <td x-text="data.author"></td>
                                        <td class="flex fle-warp">
                                            <button @click.prevent="editData(data)"
                                                class="btn btn-info">Edit</button>
                                                <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
                                                <section class="ml-3">

                                                    <button @click="showModal = true"
                                                    class="btn btn-danger">Delete</button>
                                            
                                                    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
                                                        <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                                            
                                                            <!--Title-->
                                                            <div class="flex justify-between items-center pb-3">
                                                                <p class="text-2xl font-bold">Are yout sure Delete !!!</p>
                                                                <div class="cursor-pointer z-50" @click="showModal = false">
                                                                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                            
                                                            <div class="flex justify-end pt-2">
                                                                <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2"@click.prevent="deleteData(data.id)">Yes</button>
                                                                <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" @click="showModal = false">Cancel</button>
                                                            </div>
                                            
                                            
                                                        </div>
                                                    </div>
                                                </section>
                                                </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        <span x-show="addMode">Create Book</span>
                        <span x-show="!addMode">Edit Book</span>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="saveData" x-show="addMode">
                            <div class="form-group">
                                <label>Name</label>
                                <input x-model="form.name" type="text" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input x-model="form.author" type="text" class="form-control" placeholder="Enter Author">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <form @submit.prevent="updateData" x-show="!addMode" name="edit">
                            <div class="form-group">
                                <label>Name</label>
                                <input x-model="form.name" type="text" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input x-model="form.author" type="text" class="form-control" placeholder="Enter Author">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" @click.prevent="cancelEdit">Cancel Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script src="{{ mix('/js/alpine.js') }}"></script>

</body>

</html>