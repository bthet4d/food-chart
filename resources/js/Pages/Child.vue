<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { defineComponent } from 'vue';
    import { ref, toRaw } from 'vue';
    import { usePage, Link, Head} from '@inertiajs/vue3';

    const { props } = usePage();
    const child = ref(props.child);
    console.log('Child value:', child.value);
    const name = child.value.name;
    console.log('Child Name:', name);

    const age = child.value.age;
    console.log('Child Age:', age);
    const rawProps = toRaw(props); 
    // console.log('Child Page props:', rawProps);
</script>
<template>
    <Head title="Food Chart details page for {{name}}"/>

    <AuthenticatedLayout>
        <div>
            <h1>Name: {{name}}</h1>
        </div>
    </AuthenticatedLayout>
</template>

