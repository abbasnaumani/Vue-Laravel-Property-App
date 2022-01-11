<template>
    <div class="container py-5">
        <div class="card shadow-sm login-card w-100">
            <div class="card-header bg-white border-bottom-0 mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="login-text text-uppercase letter-spacing">Users</h4>
                    <router-link to="/signup"
                                 class="float-end btn btn-primary">
                        Add
                    </router-link>
                </div>
            </div>
            <div class="card-body text-left">
                <table class="table table-responsive table-bordered table-striped table-vcenter">
					<thead>
						<tr class="text-center text-uppercase">
							<th class="col-1">Id</th>
							<th class="col-2">Name</th>
							<th class="col-2">Email</th>
							<th class="col-1">Phone Number</th>
                            <th class="col-1">Access</th>
                            <th class="col-2">Registered On</th>
                            <th colspan="2" class="col-3">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
							<td class="font-w600 col-1 font-size-sm">
								1
							</td>
							<td class="font-w600 col-2 font-size-sm">
								test
							</td>
							<td class="font-w600 col-2 font-size-sm">
								<em class="text-muted">test@gmail.com</em>
							</td>
							<td class="font-w600 col-1 font-size-sm">
								1234567890
							</td>
                            <td class="font-w600 col-1 font-size-sm">
                                <span class="badge badge-primary">Agency Admin</span>
							</td>
                            <td class="font-w600 col-2 font-size-sm">
								<em class="text-muted">2022-01-03T12:27:25.000000Z</em>
							</td>
                            <td class="font-w600 col-3 font-size-sm">
								<a href="#" class="btn btn-primary mx-1">
									<i class="fa fa-edit"></i>
								</a>
								<button class="btn btn-danger mx-1">
									<i class="far fa-trash-alt"></i>
								</button>
								<a href="#" class="btn btn-info mx-1">
									<i class="far fa-eye"></i>
								</a>
							</td>
						</tr>
						<tr class="text-center">
							<td class="font-w600 col-1 font-size-sm">
								1
							</td>
							<td class="font-w600 col-2 font-size-sm">
								test
							</td>
							<td class="font-w600 col-2 font-size-sm">
								<em class="text-muted">test@gmail.com</em>
							</td>
							<td class="font-w600 col-1 font-size-sm">
								1234567890
							</td>
                            <td class="font-w600 col-1 font-size-sm">
                                <span class="badge badge-primary">Agency Admin</span>
							</td>
                            <td class="font-w600 col-2 font-size-sm">
								<em class="text-muted">2022-01-03T12:27:25.000000Z</em>
							</td>
                            <td class="font-w600 col-3 font-size-sm">
								<a href="#" class="btn btn-primary mx-1">
									<i class="fa fa-edit"></i>
								</a>
                                <button class="btn btn-danger mx-1">
                                    <i class="far fa-trash-alt"></i>
                                </button>
								<a href="#" class="btn btn-info mx-1">
									<i class="far fa-eye"></i>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref} from "vue";

export default {
    name: "UserList",
    props:{
        slug:String
    },
    setup(props) {
        return {

        }
    }
}
</script>

<style scoped>

</style>
