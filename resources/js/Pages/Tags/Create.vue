 <template>
  <admin-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tag Index
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <section class="container mx-auto p-6 font-mono">
          <div class="w-full flex mb-4 p-2 justify-end">
            <Link
            :href="route('admin.tags.create')"
              class="
                px-4
                py-2
                bg-green-600
                hover:bg-green-800
                text-white
                rounded-lg
              "
            >
              Create Tag
            </Link>
          </div>

          Form
        </section>
      </div>
    </div>
  </admin-layout>
</template>

<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { Link } from '@inertiajs/inertia-vue3';
</script>

<style>
</style>