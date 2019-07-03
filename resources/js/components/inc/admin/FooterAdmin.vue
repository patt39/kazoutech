<template>
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="/dashboard" class="nav-link">
                            kazoutech
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="/orders" target="_blank">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            FAQs
                        </a>
                    </li>
                    <li>
                        <router-link  :to="{ path: '/dashboard/contacts/' }" class="nav-link">
                            Contacts
                        </router-link>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                <h6 style="font-size=0.9em;">&copy; 2019 -
                    {{ new Date().getFullYear() }}. Realized by <a href="/">TNP</a></h6>
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