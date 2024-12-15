<template>
  <div>
    <div class="flex">
      <select v-model="selectedProject" @change="fetchAreas"  id="project"
            class="block w-1/4 mt-1 p-2 border border-gray-500 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-xs md:text-sm mr-4">
      <option v-for="project in projects" :key="project.id" :value="project.id">{{ project.title }}</option>
    </select>
    <select v-model="selectedArea" @change="fetchUsers" id="area"
            class="block w-1/4 mt-1 p-2 border border-gray-500 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-xs md:text-sm">
      <option value="">Select Area</option>    
      <option v-for="area in areas" :key="area.id" :value="area.id">{{ area.name }}</option>
    </select>
    </div>

    <h1 class="text-2xl font-bold  p-4">{{ areas.find(area => area.id === selectedArea)?.name || '' }} Users
      <PrimaryButton class="my-2 mr-2" @click="openRegisterModal(selectedProject)" @close="closeRegisterModal">Add {{  areas.find(area => area.id === selectedArea)?.name || '' }} Users</PrimaryButton>
      <Tag class="md:m-3 mr-3" icon="pi pi-user" severity="success" ><span  class="mx-2">Active Manpower: {{ presentUsers.length }}  </span></Tag>
      <Tag class="md:m-3 mr-3" icon="pi pi-user" severity="info" ><span class="mx-2">On Rest: {{ restUsers.length }}  </span></Tag>
      <Tag class="md:m-3 mr-3" icon="pi pi-user" severity="danger" ><span class="mx-2">on Overtime: {{ overtimeUsers.length }}  </span></Tag>

      <PrimaryButton v-tooltip="'Export as CSV'" class="my-2 mr-2" @click="exportCSV"><i class="pi pi-file-export"></i></PrimaryButton>
    </h1>
    
    <Modal :show="isRegisterModalOpen" @close="closeRegisterModal" >
      <div class="p-5">
        <span class="close" @click="closeRegisterModal"><i class="material-icons" style="cursor: pointer;">close</i></span>
        <form @submit.prevent="addUser">
            <div>
                <InputLabel for="employee_id" value="Employee Id" />

                <TextInput
                    id="employee_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.employee_id"
                    required
                    autofocus
                    autocomplete="id"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mt-4">
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="mt-4">
                <InputLabel for="designation" value="Designation" />

                <TextInput
                    id="designation"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.designation"
                    required
                    autocomplete="designation"
                />

                <InputError class="mt-2" :message="form.errors.designation" />
            </div>

            <div class="mt-4">
                <InputLabel for="domain" value="Domain" />

                <TextInput
                    id="domain"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.domain"
                    required
                    autocomplete="domain"
                />

                <InputError class="mt-2" :message="form.errors.domain" />
            </div>

            <div class="mt-4">
                <InputLabel for="joining_date" value="Joining Date" />

                <input
                id="joining_date"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.joining_date"
                    required
                    autocomplete="joining_date">

                <InputError class="mt-2" :message="form.errors.joining_date" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
      </div>
      
    </Modal>
    
<!-- Update User Modal -->
<Modal :show="isUpdateModalOpen" @close="closeUpdateModal" >
  {{ form }}
      <div class="p-5">
        <span class="close" @click="closeUpdateModal"><i class="material-icons" style="cursor: pointer;">close</i></span>
        <form @submit.prevent="updateUser">
            <div>
                <InputLabel for="employee_id" value="Employee Id" />

                <TextInput
                    id="employee_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.employee_id"
                    required
                    autofocus
                    autocomplete="employee_id"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mt-4">
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            
            
            <div class="mt-4">
                <InputLabel for="reporting_manager_ids" value="Choose Reporting Manager" />
                <p v-for="manager in form.reporting_manager_ids">
                  <tag class="my-1">{{ manager.name }}</tag>
                </p>
                <select
                    id="reporting_manager_ids"
                    type="select"
                    class="mt-1 block w-full"
                    v-model="form.reporting_manager_ids"
                    multiple 
                    autocomplete="reporting_manager_ids"
                >
                <option value="">Choose Reporting Manager</option>  
                <option :value="user.id" v-for="user in AllUsers">{{ user.name }}</option>
                </select>
                

                <InputError class="mt-2" :message="form.errors.reporting_manager_ids" />
            </div>


            <div class="mt-4">
                <InputLabel for="designation" value="Designation" />

                <TextInput
                    id="designation"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.designation"
                    required
                    autocomplete="designation"
                />

                <InputError class="mt-2" :message="form.errors.designation" />
            </div>

            <div class="mt-4">
                <InputLabel for="domain" value="Domain" />

                <TextInput
                    id="domain"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.domain"
                    required
                    autocomplete="domain"
                />

                <InputError class="mt-2" :message="form.errors.domain" />
            </div>
            <div class="mt-4">
                <InputLabel for="assigned_project" value="Assigned Project" />

                <select
                    id="assigned_project"
                    type="select"
                    class="mt-1 block w-full"
                    v-model="assigned_project"
                    
                    autocomplete="asssigned_project"
                >
                <option value="">Choose Project</option>
                <option :value="project.id" v-for="project in projects">{{ project.title }}
                  

                </option>
                </select>

                <InputError class="mt-2" :message="form.errors.assigned_project" />
            </div>
            <div class="mt-4">
                <InputLabel for="assigned_area" value="Assigned Area" />
<!--                 
                <select
                    id="assigned_area"
                    type="select"
                    class="mt-1 block w-full"
                    v-model="assigned_area"
                    
                    autocomplete="assigned_area"
                >
                <option value="">Choose Area</option>
                <option :value="area.id" v-for="area in areas">{{ area.name }}</option>
                </select> -->
              <div class="card flex justify-center">
                  <MultiSelect v-model="assigned_area" :options="areas" optionLabel="name"  placeholder="Select Areas"
                      :maxSelectedLabels="5" class="w-full md:w-[20rem]" />
              </div>
                <InputError class="mt-2" :message="form.errors.assigned_area" />
            </div>

            <div class="mt-4">
                <InputLabel for="joining_date" value="Joining Date" />

                <input
                id="joining_date"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.joining_date"
                    required
                    autocomplete="joining_date">

                <InputError class="mt-2" :message="form.errors.joining_date" />
            </div>
            <div class="mt-4">
                <InputLabel for="mobile_no" value="Mobile No." />

                <input
                id="mobile_no"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.mobile_no"
                    
                    autocomplete="mobile_no">

                <InputError class="mt-2" :message="form.errors.v" />
            </div>

            <div class="mt-4">
                <InputLabel for="address" value="Address" />

                <input
                id="address"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.address"
                    
                    autocomplete="address">

                <InputError class="mt-2" :message="form.errors.address" />
            </div>

            <div class="mt-4">
                <InputLabel for="dob" value="Date Of Birth" />

                <input
                id="dob"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.dob"
                    
                    autocomplete="dob">

                <InputError class="mt-2" :message="form.errors.dob" />
            </div>

            
            <div class="mt-4">
                <InputLabel for="emergency_no" value="Emergency Contact" />

                <input
                id="emergency_no"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.emergency_no"
                    
                    autocomplete="emergency_no">

                <InputError class="mt-2" :message="form.errors.emergency_no" />
            </div>

            <div class="mt-4">
                <InputLabel for="highest_qualification" value="Highest Qualification" />

                <input
                id="highest_qualification"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.highest_qualification"
                    
                    autocomplete="highest_qualification">

                <InputError class="mt-2" :message="form.errors.highest_qualification" />
            </div>

            <div class="mt-4">
                <InputLabel for="adhaar_no" value="Adhaar No." />

                <input
                id="adhaar_no"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.adhaar_no"
                    
                    autocomplete="adhaar_no">

                <InputError class="mt-2" :message="form.errors.adhaar_no" />
            </div>

            <div class="mt-4">
                <InputLabel for="pan_no" value="PAN No." />

                <input
                id="pan_no"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.pan_no"
                    
                    autocomplete="pan_no">

                <InputError class="mt-2" :message="form.errors.pan_no" />
            </div>

            <div class="mt-4">
                <InputLabel for="bank_name" value="Bank Name" />

                <input
                id="bank_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.bank_name"
                    
                    autocomplete="bank_name">

                <InputError class="mt-2" :message="form.errors.bank_name" />
            </div>
            <div class="mt-4">
                <InputLabel for="account_holder_name" value="Account Holder Name" />

                <input
                id="account_holder_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.account_holder_name"
                    
                    autocomplete="account_holder_name">

                <InputError class="mt-2" :message="form.errors.account_holder_name" />
            </div>
            <div class="mt-4">
                <InputLabel for="account_no" value="Account No." />

                <input
                id="account_no"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.account_no"
                    
                    autocomplete="account_no">

                <InputError class="mt-2" :message="form.errors.account_no" />
            </div>

            <div class="mt-4">
                <InputLabel for="ifsc" value="IFSC Code" />

                <input
                id="ifsc"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.ifsc"
                    
                    autocomplete="ifsc">

                <InputError class="mt-2" :message="form.errors.ifsc" />
            </div>

            <div class="mt-4">
                <InputLabel for="uan" value="UAN" />

                <input
                id="uan"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.uan"
                    
                    autocomplete="uan">

                <InputError class="mt-2" :message="form.errors.uan" />
            </div>

            <div class="mt-4">
                <InputLabel for="esic" value="ESIC" />

                <input
                id="esic"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.esic"
                    
                    autocomplete="esic">

                <InputError class="mt-2" :message="form.errors.esic" />
            </div>

            <div class="mt-4">
                <InputLabel for="salary" value="Salary" />

                <input
                id="salary"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.salary"
                    
                    autocomplete="salary">

                <InputError class="mt-2" :message="form.errors.salary" />
            </div>

            <div class="mt-4">
                <InputLabel for="manday" value="Manday" />

                <input
                id="manday"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.manday"
                    
                    autocomplete="manday">

                <InputError class="mt-2" :message="form.errors.manday" />
            </div>
            <div class="mt-4">
                <InputLabel for="paid_leaves" value="Privilege Leaves" />

                <input
                id="paid_leaves"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.paid_leaves"
                    
                    autocomplete="paid_leaves">

                <InputError class="mt-2" :message="form.errors.paid_leaves" />
            </div>
            <div class="mt-4">
                <InputLabel for="sick_leaves" value="Sick Leaves" />

                <input
                id="sick_leaves"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.sick_leaves"
                    
                    autocomplete="sick_leaves">

                <InputError class="mt-2" :message="form.errors.sick_leaves" />
            </div>
            <div class="mt-4">
                <InputLabel for="casual_leaves" value="Casual Leaves" />

                <input
                id="casual_leaves"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.casual_leaves"
                    
                    autocomplete="casual_leaves">

                <InputError class="mt-2" :message="form.errors.casual_leaves" />
            </div>
            <div class="mt-4">
                <InputLabel for="rest_days" value="Rest Days" />

                <input
                id="rest_days"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.rest_days"
                    
                    autocomplete="rest_days">

                <InputError class="mt-2" :message="form.errors.rest_days" />
            </div>
            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
                </PrimaryButton>
            </div>
        </form>
      </div>
      
    </Modal>

    <!-- Update Role  -->
                    <Modal :show="isUpdateRoleModalOpen" @close="closeUpdateRoleModal">
                <div class="p-5">
                  <span class="close" @click="closeUpdateRoleModal"><i class="material-icons" style="cursor: pointer;">close</i></span>
                  <select v-model="selectedRole" class="block w-1/4 mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option v-for="role in roles" :value=" role.id ">{{role.role}}</option>
                    
                  </select>
                  <PrimaryButton class="mt-3" @click="updateRole">Update</PrimaryButton>
                </div>
                </Modal>
<!-- update password -->
                <Modal :show="isCreateNewPasswordModalOpen" @close="CloseCreateNewPassword">
                <div class="p-5">
                  <span class="close" @click="CloseCreateNewPassword"><i class="material-icons" style="cursor: pointer;">close</i></span>
<form @submit.prevent="updatePassword">
                  <div class="mt-4">
                    
                      
                    
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
              <PrimaryButton type="submit">Update</PrimaryButton></form>
                  </div>
                </Modal>

<DataTable v-model:filters="filters" filterDisplay="row" :value="users" showGridlines :sortOrder="-1" paginator :rows="10"  tableStyle="min-width: 50rem" class="text-xs md:text-sm" 
:globalFilterFields="['name']"
>
    <Column field="employee_id" header="Employee Id" sortable style="border: 2px solid black;width: 20%;font-weight: bolder" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder"></Column>
    <Column  field="name" header="Name" sortable style="border: 2px solid black;width: 40%;font-weight: bolder" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
      <template #filter="{ filterModel, filterCallback }">
        <InputText
          v-model="filterModel['value']"
          type="text"
          @input="filterCallback()"
          class="p-column-filter"
          placeholder="Search by name"
        />        </template>
    </Column>
    <Column field="email" header=" Email Id" sortable style="border: 2px solid black;width: 20%;font-weight: bolder" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder"></Column>
    <Column header="Permission" style="border: 2px solid black;width: 20%" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
  <template #body="{ data }">
    <div class="flex justify-center">
      <span v-if="data.roles[0].role === 'admin'">
        <Tag icon="pi pi-user" severity="info"><span class="ml-1">{{ data.roles[0].role }}</span></Tag>
      </span>  
      <span v-if="data.roles[0].role === 'user'">
        <Tag icon="pi" severity="success"><span class="ml-1">{{ data.roles[0].role }}</span></Tag>
      </span> 
      <span v-if="data.roles[0].role === 'project admin'">
        <Tag icon="pi" severity="warning"><span class="ml-1">{{ data.roles[0].role }}</span></Tag>
      </span>
      <button class="ml-4 p-0" v-tooltip="'Change Role'" @click="openUpdateRoleModal(data.id, data.roles[0].id)"><i class="pi pi-sync" style="font-size: 1rem;"></i></button>
    </div>
  </template>
</Column>
    <Column  header="Attendance Sheet" headerStyle="width: 5rem; text-align: center" style="border: 2px solid black;width: 20%;"  bodyStyle="text-align: center;" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
      <template #body = "{data}">
        <button v-tooltip="'view attendance'" @click="openAttendanceModal(data)"><span><i class="pi pi-list" style="font-size: 1.5rem"></i></span></button>
        <!-- Attendance Modal -->
<Modal :show="isAttendanceModalOpen" @close="closeAttendanceModal"  >
                <div class="p-5">
        <span class="close" @click="closeAttendanceModal"><i class="material-icons" style="cursor: pointer;">close</i></span>
             <div class="mt-5">
              <div class="bg-gray-200 w-1/3 p-2 text-center">
                <h1>{{ filteredTimeEntries.length }}</h1>
                <p class="text-small text-gray-500 " v-if="data.project_id === 1">Payable Days</p>
                <p class="text-small text-gray-500 " v-else>Payable Shifts</p>

              </div>
<div class="py-3">
  <h1><select v-model="selectedMonth">
      <option v-for="(month, index) in months" :key="index" :value="index + 1">{{ month }}</option>
    </select></h1>
</div>
             </div>                
        <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full text-left text-bold font-light text-center">
                        <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
                          <tr class="bg-indigo-400 text-white" v-if="data.project_id == 1">
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Date</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Clock In</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Clock Out</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Location</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Remarks</th>

                          </tr>
                          <tr class="bg-indigo-400 text-white" v-else>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Date</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Normal Shift</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Overtime Shift</th>
                            <th scope="col" class="px-6 py-4 border border-indigo-900">Remarks</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-if="data.project_id == 1" v-for="entry in filteredTimeEntries" :key="entry.id" class="border border-indigo-900 transition duration-300 ease-in-out lg:hover:bg-neutral-100 dark:border-neutral-500 lg:dark:hover:bg-neutral-600">
                        <td class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900">{{ entry.date }}</td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ entry.clock_in=== null?'-':new Date(entry.clock_in).toLocaleTimeString() }}</td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{ entry.clock_out=== null?'-': new Date(entry.clock_out).toLocaleTimeString()}}</td>
                        <td class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900"><i class="pi pi-map-marker" v-tooltip="entry.location"></i></td>
                        <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">
                        <span v-if="entry.remarks === 'present'" class="text-green-500 font-extrabold"> {{entry.remarks}}</span> 
                        <span v-else-if="entry.remarks == 'casual_leave'" class="text-yellow-500 font-extrabold"> {{entry.remarks}}</span> 
                        <span v-else-if="entry.remarks == 'sick_eave'" class="text-yellow-500 font-extrabold"> {{entry.remarks}}</span> 
                        <span v-else-if="entry.remarks == 'privilege_leave'" class="text-yellow-500 font-extrabold"> {{entry.remarks}}</span> 
                        <span v-else-if="entry.remarks == 'rest'" class="text-blue-500 font-extrabold"> Week Off</span> 
                        <span v-else-if="entry.remarks == 'holiday'" class="text-red-900 font-extrabold"> {{ entry.remarks }}</span> 
                        <span v-else-if="entry.remarks == 'work from home' || entry.remarks == 'work_from_home'" class="text-red-900 font-extrabold"> WFH</span> 

                        </td>
                      </tr>
                      <tr v-else v-for="entryGroup in groupByDateAndShift(filteredTimeEntries)" :key="entryGroup.date" class="border border-indigo-900 transition duration-300 ease-in-out lg:hover:bg-neutral-100 dark:border-neutral-500 lg:dark:hover:bg-neutral-600">
  <td class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900">{{ entryGroup.date }}</td>
  

  <!-- <td v-else v-for="shift in entryGroup.shifts" :key="shift.shiftNumber" class="whitespace-nowrap px-6 py-4 border border-indigo-900" >{{ shift.status }}</td> -->
  <td    class="whitespace-nowrap px-6 py-4 border border-indigo-900" >{{  (entryGroup.shifts[0].shiftNumber!==null) && (entryGroup.shifts.length>=1)?1:0 }}</td>
  <td    class="whitespace-nowrap px-6 py-4 border border-indigo-900" >{{ entryGroup.shifts.length>1?entryGroup.shifts.length-1:0 }}</td>
  <td    class="whitespace-nowrap px-6 py-4 border border-indigo-900 font-extrabold" >
    <span v-if="entryGroup.shifts[0].status === 'present'" class="text-green-500">{{ entryGroup.shifts[0].status}}</span> 
    <span v-else-if="entryGroup.shifts[0].status === 'leave'" class="text-yellow-500">{{ entryGroup.shifts[0].status}}</span> 
    <span v-else-if="entryGroup.shifts[0].status === 'rest'" class="text-blue-500"> {{ entryGroup.shifts[0].status}}</span>
    
  </td>
</tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                </div>
                
              </Modal>

      </template>
    </Column>

    <Column header="Actions" headerStyle="width: 5rem; text-align: center" style="border: 2px solid black;" bodyStyle="text-align: center;" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
        <template #body = "{data}" >
          <div class="flex">
            <span class="mr-4"><i class="pi pi-user-edit" v-tooltip="'Update User'" style="font-size: 1.5rem;cursor: pointer;" @click="openUpdateModal(data)"></i></span>
                <span class="mr-4"><i class="pi pi-trash" v-tooltip="'Delete User'" style="font-size: 1.5rem;cursor: pointer;color: rgb(125, 1, 1);" @click="deleteUser(data.id,data.name)"></i></span>
                <span><i class="pi pi-pencil" v-tooltip="'Update Password'" style="font-size: 1.2rem;cursor: pointer;color: green;" @click="openCreateNewPassword(data)"></i></span>


           </div>



        </template>
    </Column>

    <Column header="Offer letter" style="border: 2px solid black;" headerStyle="width: 5rem; text-align: center" bodyStyle="text-align: center" header-style="background-color: #2196F3;color: #ffff; font-weight: bolder">
    <template #body="{data}">
      <button class="btn btn-primary" v-tooltip="'Generate Offer Letter'" @click="generatePdf(data)"> <i class="pi pi-external-link"></i></button>

    </template>
    </Column>

</DataTable>
</div>
</template>

<script setup>
import { ref, onMounted, watch ,computed} from 'vue';
import DataTable from 'primevue/datatable';
import InputText from 'primevue/inputtext';
import Column from 'primevue/column';
import axios from 'axios';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import Modal from '../../Components/Modal.vue';
import InputError from '../../Components/InputError.vue';
import InputLabel from '../../Components/InputLabel.vue';
import TextInput from '../../Components/TextInput.vue';
import Paginator from 'primevue/paginator';
import Dropdown from '../../Components/Dropdown.vue';
import MultiSelect from 'primevue/multiselect';
import {  Link, useForm } from '@inertiajs/vue3';
import ResetPassword from '../Auth/ResetPassword.vue';
import iziToast from 'izitoast';
import Tag  from 'primevue/tag';  
import 'izitoast/dist/css/iziToast.min.css';
const filters = ref({
      'name': { value: null, matchMode: 'contains' }
    });
const generatePdf = async(data)=>{
  try {
    // Make a POST request to generate the PDF
    const response = await axios.post('/generate-pdf', { user: data }, { responseType: 'blob' });

    // Create a Blob URL for the PDF content
    const blob = new Blob([response.data], { type: 'application/pdf' });
    const url = window.URL.createObjectURL(blob);

    // Create a temporary anchor element
    const link = document.createElement('a');
    link.href = url;
    link.target = '_blank';
    link.download = data.name+'_offer_letter.pdf';

    // Append the anchor element to the document body and click it to trigger the download
    document.body.appendChild(link);
    link.click();

    // Clean up: remove the anchor element and revoke the Blob URL
    document.body.removeChild(link);
    window.URL.revokeObjectURL(url);
  } catch (error) {
    console.error('Failed to generate PDF:', error);
    // Handle error as needed
  }
 
}
const form = useForm({
  id:'',
  employee_id: '',
  reporting_manager_ids: [],
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    designation: '',
    domain: '',
    joining_date: null,
    mobile_no: '',
    address: '',
    dob: null,
    emergency_no: '',
    highest_qualification: '',
    adhaar_no: '',
    pan_no: '',
    bank_name: '',
    account_no: '',
    account_holder_name: '',
    ifsc: '',
    uan: '',
    esic: '',
    salary: '',
    manday: '',
    paid_leaves: '',
    sick_leaves: '',
    casual_leaves: '',
    rest_days : ''

});

const users = ref([]);
const currentMonthIndex = new Date().getMonth();
const selectedMonth = ref(currentMonthIndex+1); // Default to January
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

const filteredTimeEntries = computed(() => {
  return attendance_entries.value.filter(entry => {
    return new Date(entry.date).getMonth() === selectedMonth.value - 1;
  });
});



const projects = ref([]);
const selectedProject = ref(null);
const assigned_project = ref([]);
const assigned_area = ref([]);
const presentUsers = ref([]);
const restUsers = ref([]);
const overtimeUsers = ref([]);

const areas = ref([]);
const areasToAssign = ref();
const selectedArea = ref(1);
const isRegisterModalOpen  = ref(false);
const isCreateNewPasswordModalOpen  = ref(false);

const isAttendanceModalOpen  = ref(false);
const attendance_entries = ref([]);
const openAttendanceModal =(user)=>{
  isAttendanceModalOpen.value = true;
 attendance_entries.value = user.time_entries;
  
}
const closeAttendanceModal = ()=>{
  isAttendanceModalOpen.value = false;
 
}
const openRegisterModal =(id)=>{
  isRegisterModalOpen.value = true;
}
const closeRegisterModal = ()=>{
  isRegisterModalOpen.value = false;
}

const isUpdateModalOpen  = ref(false);
const openUpdateModal = (data) => {
console.log(data.assigned_area);
  isUpdateModalOpen.value = true;

  form.id = data.id;
  form.employee_id =  data.employee_id;
  form.reporting_manager_ids = data.reporting_managers;
  form.name = data.name;
  form.email = data.email;
  form.designation= data.designation;
  form.domain = data.domain;
  form.joining_date = data.joining_date;
  form.mobile_no = data.mobile_no;
  form.address = data.address;
  form.dob = data.dob;
  form.emergency_no = data.emergency_no;
  form.highest_qualification = data.highest_qualification;
  form.adhaar_no = data.adhaar_no;
  form.pan_no = data.pan_no;
  form.bank_name = data.bank_name;
  form.account_holder_name = data.account_holder_name;
  form.account_no = data.account_no;
  form.ifsc = data.ifsc;
  form.uan = data.uan;
  form.esic = data.esic;
  form.salary = data.salary;
  form.manday = data.manday;
  form.paid_leaves = data.paid_leaves;
  form.sick_leaves = data.sick_leaves;
  form.casual_leaves = data.casual_leaves;
  form.rest_days = data.rest_days;
  assigned_project.value = data.assigned_project;
  assigned_area.value = JSON.parse(data.assigned_area);
  console.log(form);
}
const closeUpdateModal = ()=>{
  isUpdateModalOpen.value = false;
  form.id = '',
  form.reporting_manager_id = '',
  form.employee_id =  '';
  form.name = '';
  form.email = '';
}
const selectedUserId = ref(null);
const isUpdateRoleModalOpen  = ref(false);
const openUpdateRoleModal =(id,role_id)=>{
  isUpdateRoleModalOpen.value = true;
  selectedUserId.value = id;
  selectedRole.value = role_id;
}
const closeUpdateRoleModal = ()=>{
  isUpdateRoleModalOpen.value = false;

}
const AllUsers = ref([]);
const getAllUsers = () => {
  axios.get('/admin/users')
  .then((res)=>{
    AllUsers.value = res.data;
  });
}
const selectedUserEmail = ref('');
onMounted(getAllUsers);
const openCreateNewPassword = (data)=>{
  isCreateNewPasswordModalOpen.value = true;
  form.email = data.email;
}
const CloseCreateNewPassword = ()=>{
  isCreateNewPasswordModalOpen.value = false;
  
}

const updatePassword = ()=>{
  axios.post('/admin/user/createNewPassword',{
    email: form.email,
    password: form.password,
    password_confirmation: form.password_confirmation
  })
  .then(()=>{
    iziToast.success({
        title: '',
        message: 'Successfully Updated Password',
        });
        CloseCreateNewPassword();
  })
  
}
const addUser =()=>{
  axios.post(`/admin/users/create/${selectedProject.value}/${selectedArea.value}`,form)
  .then(()=>{
    iziToast.success({
        title: '',
        message: 'Successfully Added User',
        });
    fetchUsers();
    closeRegisterModal();
  })
  .catch((error)=>{
    iziToast.error({
        title: '',
        message: error.response.data.message,
        });
  })
}
const exportCSV = () => {
  let csvContent = 'data:text/csv;charset=utf-8,';
  csvContent += 'Name,Employee Id,Designation,Manday,Location,SubLocation,'; // Header row

  // Helper function to get all dates of the previous month
  const getDatesOfPreviousMonth = (year, month) => {
    let dates = [];
    let date = new Date(year, month, 1);
    while (date.getMonth() === month) {
      dates.push(new Date(date));
      date.setDate(date.getDate() + 1);
    }
    return dates;
    
  }

  // Get the current date
  const currentDate = new Date();

  // Calculate the previous month
  const previousMonth = new Date(currentDate.getFullYear(), currentDate.getMonth()-1 ,1);
  
  // Get all dates of the previous month
  const datesOfPreviousMonth = getDatesOfPreviousMonth(previousMonth.getFullYear(), previousMonth.getMonth());

  // Construct the header row with dates
  datesOfPreviousMonth.forEach(date => {
    const dateString = date.toDateString(); // Get date in 'YYYY-MM-DD' format
    csvContent += `${dateString},`;
  });
  csvContent += 'Total Present, Total Absent, Rest, Overtime\r\n'; // Add extra columns

  // Iterate over users
  users.value.forEach(user => {
    // Filter entries from the previous month
    const previousMonthTimeEntries = user.time_entries.filter(entry => {
      const entryDate = new Date(entry.date); // Assuming each time entry has a 'date' property
      return entryDate.getFullYear() === previousMonth.getFullYear() && entryDate.getMonth() === previousMonth.getMonth();
    });

    // Create a map of entries by date for quick lookup
    const entriesByDate = new Map();
    previousMonthTimeEntries.forEach(entry => {
      const entryDate = new Date(entry.date).toDateString() // Get date in 'YYYY-MM-DD' format
      entriesByDate.set(entryDate, entry);
    });

   
    // Initialize the CSV row with user data
    let csvRow = `${user.name},${user.employee_id},${user.designation},${user.manday},${user.project.title},${user.area.name}`;
    
    // Variables to track total present and absent days
    let totalPresent = 0;
    let totalAbsent = 0;
    let totalRest = 0;
    let totalOverTime = 0;
    // Iterate over all dates of the previous month
    datesOfPreviousMonth.forEach(date => {
      const dateString = date.toDateString(); // Get date in 'YYYY-MM-DD' format
      if (entriesByDate.has(dateString)) {
        const entry = entriesByDate.get(dateString);
        csvRow += `,${entry.remarks}`; // Modify to include relevant entry details
        if(entry.remarks == 'present'){
          if(entry.shift_no == 1 || entry.shift_no == null){
            totalPresent++;
          }
          else{
            totalOverTime++;
          }

        }
        else{
          totalRest++;
        }
      } else {
        csvRow += `,A`;
        totalAbsent++;
      }
    });

    // Add total present, total absent, rest, and overtime
    csvRow += `,${totalPresent},${totalAbsent},${totalRest},${totalOverTime}\r\n`; // Assuming rest and overtime values are 0 for now

    csvContent += csvRow;
  });

   // Output the final CSV content
      // Create a link element and trigger a click to download the CSV
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement('a');
      link.setAttribute('href', encodedUri);
      link.setAttribute('download', 'users_atendance.csv');
      document.body.appendChild(link);
      link.click();
    };


const updateUser = ()=>{
  console.log(form);
  axios.post('/admin/users/update',{
    id:form.id,
    employee_id:form.employee_id,
    reporting_manager_ids:form.reporting_manager_ids,
    name:form.name,
    email:form.email,
    designation: form.designation,
    domain: form.domain,
    joining_date : form.joining_date,
  mobile_no : form.mobile_no,
  address : form.address,
  dob : form.dob,
  emergency_no : form.emergency_no,
  highest_qualification : form.highest_qualification,
  adhaar_no : form.adhaar_no,
  pan_no : form.pan_no,
  bank_name : form.bank_name,
  account_holder_name : form.account_holder_name,
  account_no : form.account_no,
  ifsc : form.ifsc,
  uan : form.uan,
  esic : form.esic,
  salary : form.salary,
  manday : form.manday,
  paid_leaves: form.paid_leaves,
  sick_leaves: form.sick_leaves,
  casual_leaves: form.casual_leaves,
  rest_days: form.rest_days,
  assigned_project: assigned_project.value,
  assigned_area: assigned_area.value

  })
  .then(()=>{
    iziToast.success({
        title: '',
        message: 'User Updated Successfully',
        });
    closeUpdateModal();
    fetchUsers();
  })
  .catch((error)=>{
    iziToast.error({
        title: '',
        message: error.response.data.message,
        });
  })
}
const updateRole =()=>{
  axios.post('/admin/users/role/update',{
    user_id: selectedUserId.value,
    role_id: selectedRole.value
  })
  .then((res)=>{
    iziToast.success({
        title: '',
        message: 'Permission updated successfully',
        });
    fetchUsers();
    closeUpdateRoleModal();
  })
  .catch((error)=>{
    iziToast.error({
        title: '',
        message: error.response.data.message,
        });
  })
}
const deleteUser = (id,name)=>{
  iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure about that?',
            position: 'center',
            
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
        
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    axios.post(`/admin/users/delete/${id}`)
                    .then(()=>{
                      iziToast.success({
                            title: '',
                            message: 'User Deleted Successfully',
                            });
                      fetchUsers();
                    })
                    .catch((error)=>{
                      iziToast.error({
                        title: '',
                        message: error.response.data.message,
                      });
                    })
                }, true],
                ['<button>NO</button>', function (instance, toast) {
        
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }],
            ],
        });

}
const selectedRole = ref('');
const page = ref(1);
const perPage = ref(10);
const totalItems = ref(0);
onMounted(async () => {
  try {
    // Fetch projects
    const projectsResponse = await axios.get('/projects/get',{
    });
    projects.value = projectsResponse.data;
    // Set the default selected project (you can adjust this based on your needs)
    if (projects.value.length > 0) {
      selectedProject.value = projects.value[0].id;
      fetchUsers();
    }
  } catch (error) {
    console.error('Error fetching projects:', error);
  }
});

watch(selectedArea, fetchUsers);
watch(selectedProject,fetchAreas);
watch(assigned_project,fetchAreas);
async function fetchUsers() {
  try {
    // Fetch users based on the selected project
    const response = await axios.get(`/area/user/${selectedArea.value}`,{
      params: {
        page: page.value,
        per_page: perPage.value,
      },
    });
    users.value = response.data.usersWithAttendance.data;
    totalItems.value = response.data.total;
    presentUsers.value = response.data.presentUsersToday;
    restUsers.value = response.data.restUsersToday;
    overtimeUsers.value = response.data.overtimeUsersToday;

  } catch (error) {
    console.error('Error fetching users:', error);
  }
}

async function fetchAreas() {
  try {
    // Fetch users based on the selected project
    const response = await axios.get(`/areas/${selectedProject.value}`);
    areas.value = response.data;
  } catch (error) {
    console.error('Error fetching users:', error);
  }
}
async function handlePageChange(newPage) {
  page.value = newPage;
  await fetchUsers();
}

const roles = ref([]);
const getRoles = () =>{
  axios.get('/roles')
  .then((res)=>{
    roles.value = res.data;
  })
}
const groupByDateAndShift = (entries) => {
  const grouped = {};

  entries.forEach(entry => {
    if (!grouped[entry.date]) {
      grouped[entry.date] = {
        date: entry.date,
        shifts: [],
      };
    }

    // Check if entry for the shift exists
    const shiftEntry = grouped[entry.date].shifts.find(shift => shift.shiftNumber === entry.shift_no);

    if (shiftEntry) {
      // Entry for the shift exists, update status
      shiftEntry.status = entry.remarks;
    } else {
      // Entry for the shift doesn't exist, check if there are no time entries for the day
      const noTimeEntriesForDay = !grouped[entry.date].shifts.length;


        // Mark the shift as absent
        grouped[entry.date].shifts.push({
          shiftNumber: entry.shift_no,
          status: entry.remarks,
        });
      
    }
  });

  return Object.values(grouped);
};

onMounted(getRoles);
</script>
