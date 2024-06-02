<script setup>
import { ref, toRaw } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import Sheet from "@/shadcn/ui/sheet/Sheet.vue";
import SheetContent from "@/shadcn/ui/sheet/SheetContent.vue";
import SheetHeader from "@/shadcn/ui/sheet/SheetHeader.vue";
import SheetTitle from "@/shadcn/ui/sheet/SheetTitle.vue";
import SheetDescription from "@/shadcn/ui/sheet/SheetDescription.vue";
import SheetTrigger from "@/shadcn/ui/sheet/SheetTrigger.vue";
import Label from "@/shadcn/ui/label/Label.vue";
import Button from "@/shadcn/ui/button/Button.vue";
import Input from "@/shadcn/ui/input/Input.vue";
import SheetFooter from "@/shadcn/ui/sheet/SheetFooter.vue";
import SheetClose from "@/shadcn/ui/sheet/SheetClose.vue";

const props = defineProps({
    children: Array,
    right: String,
    top: String,
});

const childNavDirection = "right";
const familyNavDirection = "top";
</script>

<template>
    <div>
        <aside class="flex-shrink-0 h-screen bg-white shadow-md w-36 lg:w-48">
            <div class="h-full p-4">
                <div class="mb-4 text-lg font-bold text-gray-600">Menu</div>
                <div class="flex flex-wrap">
                    <Sheet v-for="child in children" :key="child.id">
                        <SheetTrigger as-child>
                            <Button variant="outline" class="w-full mb-4">
                                {{ child.name }}
                            </Button>
                            <br />
                        </SheetTrigger>
                        <SheetContent :side="right">
                            <SheetHeader>
                                <SheetTitle>Edit profile</SheetTitle>
                                <SheetDescription>
                                    Make changes to your child's profile here.
                                    Click save when you're done.
                                </SheetDescription>
                            </SheetHeader>
                            <div class="grid gap-4 py-4">
                                <div
                                    class="grid items-center grid-cols-4 gap-4"
                                >
                                    <Label for="name" class="text-right"
                                        >Name</Label
                                    >
                                    <Input
                                        id="name"
                                        v-model="child.name"
                                        class="col-span-3"
                                    />
                                </div>
                            </div>
                            <SheetFooter>
                                <SheetClose as-child>
                                    <Button type="submit">
                                        Save changes
                                    </Button>
                                </SheetClose>
                            </SheetFooter>
                        </SheetContent>
                    </Sheet>
                </div>
            </div>
        </aside>
    </div>
</template>
