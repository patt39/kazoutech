import DashboardIndex from "../components/admin/DashboardIndex";
import AdminAccount from "../components/admin/account/AdminAccount";
import AdminProfileEdit from "../components/admin/account/AdminProfileEdit";
import ColorIndex from "../components/admin/partial/color/ColorIndex";
import CountriesIndex from "../components/admin/partial/country/CountriesIndex";
import AdminChangePassword from "../components/admin/account/AdminChangePassword";
import CategoryIndex from "../components/admin/partial/category/site/CategoryIndex";
import CategoryCreate from "../components/admin/partial/category/site/CategoryCreate";
import CategoryEdit from "../components/admin/partial/category/site/CategoryEdit";
import ContactIndex from "../components/admin/contact/ContactIndex";
import ContactMessageShow from "../components/admin/contact/ContactMessageShow";
import TagIndex from "../components/admin/partial/tag/TagIndex";
import TagCreate from "../components/admin/partial/tag/TagCreate";
import TagEdit from "../components/admin/partial/tag/TagEdit";
import TagView from "../components/admin/partial/tag/TagView";


export const routes = [

    {path: '/dashboard/', name: 'dashboard.index', component: DashboardIndex,},
    {path: '/dashboard/account/profile/', name: 'admin.account', component: AdminAccount,},
    {path: '/dashboard/profile/:username', name: 'admin.view', component: AdminAccount,},
    {path: '/dashboard/user/update/', name: 'admin.edit_profile', component: AdminProfileEdit,},
    {path: '/dashboard/colors/', name: 'colors.index', component: ColorIndex,},
    {path: '/dashboard/countries/', name: 'countries.index', component: CountriesIndex,},
    {path: '/dashboard/change_password/', name: 'admin.change_password', component: AdminChangePassword,},

    //Route categories
    {path: '/dashboard/categories/', name: 'categories.index', component: CategoryIndex,},
    {path: '/dashboard/categories/create/', name: 'categories.create', component: CategoryCreate,},
    {path: '/dashboard/categories/:id/edit', name: 'categories.edit', component: CategoryEdit,},

    //Route tags
    {path: '/dashboard/tags/', name: 'tags.index', component: TagIndex,},
    {path: '/dashboard/tags/create/', name: 'tags.create', component: TagCreate,},
    {path: '/dashboard/tags/:id/edit/', name: 'tags.edit', component: TagEdit,},
    {path: '/dashboard/tags/show/:tag', name: 'tags.view', component: TagView,},

    //Route contacts
    {path: '/dashboard/contacts/', name: 'contacts.index', component: ContactIndex,},
    {path: '/dashboard/contacts/msg/:contact', name: 'contacts.view', component: ContactMessageShow,},

];