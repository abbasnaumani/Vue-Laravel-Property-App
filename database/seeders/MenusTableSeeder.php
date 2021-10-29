<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['id' => 1, 'name' => 'Dashboard', 'parent_id' => 0, 'route' => 'dashboard', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'si si-cursor', 'is_count' => 0, 'is_active' => 1],
            ['id' => 2, 'name' => 'Users', 'parent_id' => 5, 'route' => 'user.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-users', 'is_count' => 0, 'is_active' => 1],
            ['id' => 3, 'name' => 'User Profile', 'parent_id' => 5, 'route' => 'user.edit.profile', 'sort_order' => 0, 'class' => 'nav-main-link-submenu', 'icon' => 'fa fa-users', 'is_count' => 0, 'is_active' => 1],
            ['id' => 4, 'name' => 'Role', 'parent_id' => 0, 'route' => 'role.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 5, 'name' => 'User Section', 'parent_id' => 0, 'route' => 'user.*', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 6, 'name' => 'All Users Checkin History', 'parent_id' => 0, 'route' => 'all.users.checkin.report', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],

            ['id' => 7, 'name' => 'Approval Section', 'parent_id' => 0, 'route' => 'approve.*', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 8, 'name' => 'Apply Leave', 'parent_id' => 0, 'route' => 'leave.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 9, 'name' => 'Leave Type', 'parent_id' => 0, 'route' => 'leave.type.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 10, 'name' => 'Request Status', 'parent_id' => 0, 'route' => 'request.status.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 11, 'name' => 'Attendance', 'parent_id' => 0, 'route' => 'attendance.mark', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 12, 'name' => 'Attendance History', 'parent_id' => 0, 'route' => 'attendance.list.today', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 13, 'name' => 'Holiday', 'parent_id' => 0, 'route' => 'holiday.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 14, 'name' => 'Leave', 'parent_id' => 7, 'route' => 'approve.leave.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 15, 'name' => 'Expense', 'parent_id' => 7, 'route' => 'approve.expense.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 16, 'name' => 'Claim Expense', 'parent_id' => 0, 'route' => 'expense.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 17, 'name' => 'Add Query', 'parent_id' => 0, 'route' => 'userquery.add', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 18, 'name' => 'User Quries', 'parent_id' => 0, 'route' => 'userquery.admin.view.userqueries', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 19, 'name' => 'Comments', 'parent_id' => 0, 'route' => 'userquery.comments', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 20, 'name' => 'Discussions', 'parent_id' => 0, 'route' => 'admin.user.discussions', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            //            ['id' => 21, 'name' => 'Project Manager', 'parent_id' => 0, 'route' => 'user.project.managers', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            //            ['id' => 22, 'name' => 'Projects', 'parent_id' => 0, 'route' => 'user.projects.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 22, 'name' => 'Projects', 'parent_id' => 0, 'route' => 'project.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 23, 'name' => 'Technology Stack', 'parent_id' => 0, 'route' => 'technology.stack.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 24, 'name' => 'Jobs', 'parent_id' => 0, 'route' => 'job.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            //            ['id' => 25, 'name' => 'Working Projects', 'parent_id' => 0, 'route' => 'engagement.manager.working.project.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            //            ['id' => 26, 'name' => 'Admins', 'parent_id' => 5, 'route' => 'admin.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 25, 'name' => 'Checkin History', 'parent_id' => 0, 'route' => 'checkin.report', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 26, 'name' => 'Today Report', 'parent_id' => 0, 'route' => 'report.index', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 27, 'name' => 'Policy', 'parent_id' => 0, 'route' => 'user.policy', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],

        ];
        DB::table('menus')->insert($menus);
    }
}
