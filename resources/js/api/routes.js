import DashboardIndex from "../components/admin/DashboardIndex";
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
import UserIndex from "../components/admin/user/UserIndex";
import UserEdit from "../components/admin/user/UserEdit";
import MessageIndex from "../components/admin/user/message/MessageIndex";
import MessageSend from "../components/admin/user/message/MessageSend";
import MessageView from "../components/admin/user/message/MessageView";
import OccupationIndex from "../components/admin/occupation/OccupationIndex";
import CategoryFaqIndex from "../components/admin/faq/CategoryFaqIndex";
import FaqIndex from "../components/admin/faq/FaqIndex";
import FaqCreate from "../components/admin/faq/FaqCreate";
import FaqEdit from "../components/admin/faq/FaqEdit";
import AdministratorIndex from "../components/admin/administrator/AdministratorIndex";
import AdministratorEdit from "../components/admin/administrator/AdministratorEdit";
import CityIndex from "../components/admin/partial/city/CityIndex";
import PermissionIndex from "../components/admin/permission/PermissionIndex";
import NoteIndex from "../components/admin/partial/note/NoteIndex";
import TaskIndex from "../components/admin/partial/task/TaskIndex";
import TaskUser from "../components/admin/partial/task/TaskUser";
import RoleIndex from "../components/admin/role/RoleIndex";
import AboutIndex from "../components/admin/page/about/AboutIndex";
import AboutCreate from "../components/admin/page/about/AboutCreate";
import AboutEdit from "../components/admin/page/about/AboutEdit";
import HowregisterIndex from "../components/admin/infos/howregister/HowregisterIndex";
import HowregisterCreate from "../components/admin/infos/howregister/HowregisterCreate";
import HowregisterEdit from "../components/admin/infos/howregister/HowregisterEdit";
import AdministratorShow from "../components/admin/account/AdministratorShow";
import AdminResetPassword from "../components/admin/account/AdminResetPassword";
import TechnicianIndex from "../components/admin/technician/TechnicianIndex";
import TechnicianEdit from "../components/admin/technician/TechnicianEdit";
import TechnicianPostIndex from "../components/admin/partial/posts/TechnicianPostIndex";
import FollowerIndex from "../components/admin/follow/FollowerIndex";
import FollowingIndex from "../components/admin/follow/FollowingIndex";
import AdminAccount from "../components/admin/account/AdminAccount";
import ProfileUserEdit from "../components/user/account/ProfileUserEdit";
import ProfileUserIndex from "../components/user/account/ProfileUserIndex";
import RegisterIndex from "../components/user/auth/RegisterIndex";
import ContactUser from "../components/user/contact/ContactUser";
import ActivityIndex from "../components/admin/partial/activity/ActivityIndex";
import LinkIndex from "../components/admin/partial/link/LinkIndex";
import TechnicianView from "../components/admin/technician/TechnicianView";
import TestimonialIndex from "../components/admin/page/testimonial/TestimonialIndex";
import TestimonialCreate from "../components/admin/page/testimonial/TestimonialCreate";
import TestimonialEdit from "../components/admin/page/testimonial/TestimonialEdit";
import TestimonialShow from "../components/admin/page/testimonial/TestimonialShow";
import DiplomaIndex from "../components/admin/partial/diploma/DiplomaIndex";
import TechnicianProfileIndex from "../components/user/Profile/TechnicianProfileIndex";
import TechnicianProfileEdit from "../components/user/Profile/TechnicianProfileEdit";
import TechnicianByCity from "../components/admin/technician/by/TechnicianByCity";
import TechnicianByOccupation from "../components/admin/technician/by/TechnicianByOccupation";


export const routes = [

    {path: '/dashboard/', name: 'dashboard.index', component: DashboardIndex},
    {path: '/dashboard/account/profile/', name: 'admin.account', component: AdminAccount},
    {path: '/dashboard/user/update/', name: 'admin.edit_profile', component: AdminProfileEdit},
    {path: '/dashboard/user/password/change/', name: 'admin.change_password', component: AdminChangePassword,},
    {path: '/dashboard/user/password/reset/', name: 'admin.reset_password', component: AdminResetPassword},
    {path: '/dashboard/colors/', name: 'colors.index', component: ColorIndex},
    {path: '/dashboard/countries/', name: 'countries.index', component: CountriesIndex},

    //Route administrators
    {path: '/dashboard/administrators/', name: 'administrators.index', component: AdministratorIndex},
    {path: '/dashboard/administrators/:id/edit/', name: 'administrators.edit', component: AdministratorEdit},

    //Route activities
    {path: '/dashboard/activities/', name: 'activities.index', component: ActivityIndex},

     //Route links
     {path: '/dashboard/links/', name: 'links.index', component: LinkIndex},


    //Route occupations
    {path: '/dashboard/occupations/', name: 'occupations.index', component: OccupationIndex},

    //Route cities
    {path: '/dashboard/cities/', name: 'cities.index', component: CityIndex},
    //Route diplomas
    {path: '/dashboard/diplomas/', name: 'diplomas.index', component: DiplomaIndex},

    //Route categories FAQS
    {path: '/dashboard/category-faqs/', name: 'categoryfaqs.index', component: CategoryFaqIndex},
    //Route permissions
    {path: '/dashboard/permissions/', name: 'permissions.index', component: PermissionIndex},
    //Route roles
    {path: '/dashboard/roles/', name: 'roles.index', component: RoleIndex},

    //Route FAQS
    {path: '/dashboard/faqs/', name: 'faqs.index', component: FaqIndex},
    {path: '/dashboard/faqs/create/', name: 'faqs.create', component: FaqCreate},
    {path: '/dashboard/faqs/:id/edit/', name: 'faqs.edit', component: FaqEdit},

    //Route categories
    {path: '/dashboard/categories/', name: 'categories.index', component: CategoryIndex},
    {path: '/dashboard/categories/create/', name: 'categories.create', component: CategoryCreate},
    {path: '/dashboard/categories/:id/edit/', name: 'categories.edit', component: CategoryEdit},

    //Route Abouts
    {path: '/dashboard/abouts/', name: 'abouts.index', component: AboutIndex},
    {path: '/dashboard/abouts/create/', name: 'abouts.create', component: AboutCreate},
    {path: '/dashboard/abouts/:id/edit/', name: 'abouts.edit', component: AboutEdit},

     //Route Infos
     {path: '/dashboard/registrations/', name: 'registrations.index', component: HowregisterIndex},
     {path: '/dashboard/registrations/create/', name: 'registrations.create', component: HowregisterCreate},
     {path: '/dashboard/registrations/:id/edit/', name: 'registrations.edit', component: HowregisterEdit},

    //Route tags
    {path: '/dashboard/tags/', name: 'tags.index', component: TagIndex},
    {path: '/dashboard/tags/create/', name: 'tags.create', component: TagCreate},
    {path: '/dashboard/tags/:id/edit/', name: 'tags.edit', component: TagEdit},
    {path: '/dashboard/tags/show/:tag/', name: 'tags.view', component: TagView},

    //Route users
    {path: '/dashboard/users/', name: 'users.index', component: UserIndex},
    {path: '/dashboard/users/:id/edit/', name: 'users.edit', component: UserEdit},
    {path: '/dashboard/users/p/:username/', name: 'users.view', component: AdministratorShow},

    //Route followers
    {path: '/dashboard/users/p/:username/followers/', name: 'follower.view', component: FollowerIndex},
    {path: '/dashboard/users/p/:username/followings/', name: 'following.view', component: FollowingIndex},

    //Route contacts
    {path: '/dashboard/contacts/', name: 'contacts.index', component: ContactIndex},
    {path: '/dashboard/contacts/msg/:contact/', name: 'contacts.view', component: ContactMessageShow},


    {
        path: '/dashboard/messages/',
        name: 'messages.index',
        component: MessageIndex,
        //children: [
        //    {path: 'send/', name: 'messages.send', component: MessageSend,},
        //]
    },
    {path: '/dashboard/messages/msg/:message/', name: 'messages.view', component: MessageView},
    {path: '/dashboard/messages/m/send/', name: 'messages.send', component: MessageSend},


    {path: '/dashboard/notes/', name: 'notes.index', component: NoteIndex},
    {path: '/dashboard/tasks/', name: 'tasks.index', component: TaskIndex},
    {path: '/dashboard/tasks/u/:username/', name: 'tasks.view', component: TaskUser},

    //Route technicians
    {path: '/dashboard/technicians/', name: 'technicians.index', component: TechnicianIndex},
    {path: '/dashboard/technicians/:id/edit/', name: 'technicians.edit', component: TechnicianEdit},
    {path: '/dashboard/technicians/u/:technician', name: 'technicians.view', component: TechnicianView},
    {path: '/dashboard/technicians/c/:city', name: 'city.technician', component: TechnicianByCity},
    {path: '/dashboard/technicians/o/:occupation', name: 'occupation.technician', component: TechnicianByOccupation},
    {path: '/profile/t/:technician', name: 'technicians.profile', component: TechnicianProfileIndex},
    {path: '/profile/t/:technician/edit', component: TechnicianProfileEdit},
    {path: '/dashboard/posts/', name: 'posts.index', component: TechnicianPostIndex},


    //Route testimonials
    { path: '/dashboard/testimonials', name: 'testimonials.index', component: TestimonialIndex },
    { path: '/dashboard/testimonials/create', name: 'testimonials.create', component: TestimonialCreate },
    { path: '/dashboard/testimonials/:id/edit', name: 'testimonials.edit', component: TestimonialEdit },
    { path: '/dashboard/testimonials/tm/:testimonial', name: 'testimonials.show', component: TestimonialShow },


    /** Ici je recupere les route du site **/

    //Route auth
    {path: '/register/', name: 'register', component: RegisterIndex},
    //Route profile user

    {path: '/:username', name: 'profile.view', component: ProfileUserIndex},
    {path: '/profile/edit/', name: 'profile.edit', component: ProfileUserEdit},

    //Route contact page
    {path: '/cm/contact/', name: 'contact_cm', component: ContactUser},
];