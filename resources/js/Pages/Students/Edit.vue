<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link, useForm  } from '@inertiajs/inertia-vue3';

const props = defineProps({
    student: Object,
    image: String
});

const form = useForm({
      name: props.student.name,
      age: props.student.age,
      status: props.student.status,
      image: null,
    });

    function updateStudent() {
      Inertia.post(`/students/${props.student.id}`,{
        _method: 'put',
        name: form.name,
        age: form.age,
        status: form.status,
        image: form.image,
      })
    }

    
</script>

<template>
    <Head title="Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- This example requires Tailwind CSS v2.0+ -->
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-gray-900">Add Student</h1>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <Link href="/students" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Back</Link>
    </div>
  </div>
  <div class="mt-8 flex flex-col">
   
<form @submit.prevent="updateStudent" class="space-y-8 divide-y divide-gray-200">
  <div class="space-y-8 divide-y divide-gray-200">
    <div>
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">Student Details</h3>
      </div>

      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        

        

        

        
      </div>
    </div>

    <div class="pt-8">
      
      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="name" class="block text-sm font-medium text-gray-700"> Full name </label>
          <div class="mt-1">
            <input type="text" name="name" id="name" autocomplete="name" v-model="form.name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
          </div>
        </div>

        

        <div class="sm:col-span-4">
          <label for="age" class="block text-sm font-medium text-gray-700"> Age</label>
          <div class="mt-1">
            <input id="age" name="age" type="date" autocomplete="age" v-model="form.age" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="status" class="block text-sm font-medium text-gray-700"> Status </label>
          <div class="mt-1">
            <select id="status" name="status" autocomplete="status" v-model="form.status" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="cover-photo" class="block text-sm font-medium text-gray-700"> Profile photo </label>
          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
              <div class="m-2 p-2" >
                <img :src="image" class="w-32 h-32">
              </div>
              <div class="flex text-sm text-gray-600">
                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                  <span>Upload a file </span><br>
                  <input id="image" name="image" type="file" class="sr-only" @input="form.image = $event.target.files[0]">
                </label>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="pt-5">
    <div class="flex justify-end">
      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
    </div>
  </div>
</form>
  </div>
</div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

