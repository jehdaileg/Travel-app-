<template>
    <div>

        <section><Header /></section>

        <section class="main_content">
            Provinces Section
        </section>

        <section><Footer /></section>

    </div>
</template>

<script>

import Header from "../layouts/Header";

import Footer from "../layouts/Footer";
export default {

    components: {
        Header,
        Footer
    }

}
</script>
