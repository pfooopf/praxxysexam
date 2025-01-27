<script setup>
defineProps({
    links: Array,
});
</script>

<template>
    <nav class="flex justify-center mt-4">
        <ul class="inline-flex -space-x-px">
            <li v-for="link in links" :key="link.label">
                <a
                    :href="link.url"
                    v-html="link.label"
                    :class="[
                        'px-3 py-2 border border-gray-300',
                        link.active ? 'bg-gray-300' : 'bg-white',
                    ]"
                    class="hover:bg-gray-100"
                ></a>
            </li>
        </ul>
    </nav>
</template>
