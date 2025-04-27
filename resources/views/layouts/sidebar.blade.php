<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('patients.list') }}">List of Patients</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('doctors.list') }}">List of Doctors</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('appointments.list') }}">List of Appointments</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3"">
                <a href="{{ route('medical_records.index') }}">List of Medical Records</a>
            </li>
        </ul>
    </div>
</div>