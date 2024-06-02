<script setup>
import { ref, toRaw } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import Card from "@/shadcn/ui/card/Card.vue";
import CardContent from "@/shadcn/ui/card/CardContent.vue";
import CardHeader from "@/shadcn/ui/card/CardHeader.vue";
import CardTitle from "@/shadcn/ui/card/CardTitle.vue";
import CardDescription from "@/shadcn/ui/card/CardDescription.vue";
import CardFooter from "@/shadcn/ui/card/CardFooter.vue";
import Button from "@/shadcn/ui/button/Button.vue";
import Seperator from "@/shadcn/ui/separator/Separator.vue";

const props = defineProps({
    pantries: Array,
    pantryCount: Number,
    familyName: String,
});
console.log("Pantries:", props.pantries);
console.log("Family Name:", props.familyName);
</script>

<template>
    <div class="w-1/2">
        <!-- <div class="mb-4 text-lg font-bold text-gray-600">Pantries</div> -->
        <Card>
            <CardHeader>
                <CardTitle>{{ familyName }} family Pantries:</CardTitle>
                <Seperator class="m-2"></Seperator>
                <CardDescription
                    >Edit your Family Pantries here.</CardDescription
                >
            </CardHeader>
            <CardContent>
                <p>Number of pantries: {{ pantryCount }}</p>
                <ul>
                    <li v-for="pantry in pantries" :key="pantry.id">
                        <Button variant="secondary" class="p-4 mt-4">
                            <Link :href="'/pantries/' + pantry.id">{{
                                pantry.name
                            }}</Link>
                        </Button>
                    </li>
                </ul>

                <Button class="p-4 mt-4">
                    <Link :href="'/pantries/create'">Add a new pantry</Link>
                </Button>
            </CardContent>
            <!-- <CardFooter> Card Footer </CardFooter> -->
        </Card>
    </div>
</template>
