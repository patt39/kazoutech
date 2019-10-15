<template>
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="/" target="_blank">
                            <p><b>kazoutech</b></p>
                        </a>
                    </li>
                    <li>
                        <a href="/abouts">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="/contacts">
                            Contacts
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                <h6 style="font-size=0.9em;">&copy; 2019 -
                    {{ new Date().getFullYear() }}. Realized by <a href="/">TNP</a> version 0.2</h6>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "FooterAdmin"
    }
</script>

<style scoped>

</style>
