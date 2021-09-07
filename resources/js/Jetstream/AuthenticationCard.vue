<template>
    <div class="bg-hero-bg bg-cover bg-center bg-black">
        <div class="min-h-screen flex flex-col lg:flex-row justify-center md:justify-evenly items-center pt-6 sm:pt-0 bg-black bg-opacity-60">
            <div>
                <slot name="logo" />
            </div>

            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <slot />
            </div>
        </div>
    </div>
</template>
