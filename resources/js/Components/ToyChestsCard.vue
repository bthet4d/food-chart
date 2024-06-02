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

const props = defineProps({
    toyChests: Array,
    familyName: String,
    user: Object,
});
console.log("user in ToyChests card:", props.user);
console.log("Toy Chests:", props.toyChests);
</script>

<template>
    <div class="w-1/2">
        <Card>
            <CardHeader>
                <CardTitle class=""
                    >{{ familyName }} family Toy Chests</CardTitle
                >
                <CardDescription>Toy Chest and Prizes</CardDescription>
            </CardHeader>
            <CardContent>
                <!-- <Card
                    class="flex flex-wrap w-1/3"
                    v-for="toyChest in props.toyChests"
                    :key="toyChest.id"
                >
                    <CardContent>
                        <p>Toy Chest: {{ toyChest.name }}</p>
                        <p>Prizes: {{ toyChest.prizes }}</p>
                        <p>Points: {{ toyChest.points }}</p>
                        <Button>
                            <Link :href="'/toy-chests/' + toyChest.id">
                                Edit Toy Chest
                            </Link>
                        </Button>
                        <Button>Add Prize</Button>
                    </CardContent>
                </Card> -->

                <div
                    v-for="toyChest in props.ToyChests"
                    :key="toyChest.id"
                    class="flex flex-wrap w-1/3 border rounded-lg shadow-sm bg-card text-card-foreground"
                >
                    <div class="p-4 m-4">
                        <p>Toy Chest: {{ toyChest.name }}</p>
                        <p>Prizes: {{ toyChest.prizes }}</p>
                        <p>Points: {{ toyChest.points }}</p>
                    </div>
                    <Button variant="outline" class="p-2 m-2">
                        <Link :href="'/toy-chests/' + toyChest.id">
                            Edit Toy Chest
                        </Link>
                    </Button>
                    <Button>Add Prize</Button>
                </div>
            </CardContent>
            <CardFooter> </CardFooter>
        </Card>
    </div>
</template>
