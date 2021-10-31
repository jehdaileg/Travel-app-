<template>
    <div>

       <section class="header">

           <Header></Header>

       </section>

       <section class="main_content">

            Contients Section

       </section>

        <section class="footer">

            <Footer />

        </section>


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
