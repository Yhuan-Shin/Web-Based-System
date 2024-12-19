
<div wire:poll.3000ms x-data="{ forms: [{ birthday: '', age: '' }] }">
    <template x-for="(form, index) in forms" :key="index">
        <div class="form-group border rounded p-3 mb-3">
            <div>
                <label for="student_no">Student No.</label>
                <input type="text" class="form-control" x-bind:id="'student_no_' + index" name="student_no[]" required>
            </div>
            <div>
                <label for="full_name">Last Name</label>
                <input type="text" maxlength="30" class="form-control" placeholder="Last Name" x-bind:id="'child_full_name_' + index" name="st_last_name[]" required>
            </div>
            <div>
                <label for="first_name">First Name</label>
                <input type="text" maxlength="30" class="form-control" placeholder="First Name" x-bind:id="'child_first_name_' + index" name="st_first_name[]" required>
            </div>
            <div>
                <label for="middle_name">Middle Name</label>
                <input type="text" maxlength="30" class="form-control" placeholder="Middle Name" x-bind:id="'child_middle_name_' + index" name="st_middle_name[]" required>
            </div>
            <div>
                <label for="birthday">Child's Date of Birth</label>
                <input type="date" class="form-control" x-bind:id="'child_birthday_' + index" x-model="form.birthday" @change="form.age = calculateAge(form.birthday)" name="birthday[]" required>
            </div>
            <div>
                <label for="age">Age</label>
                <input type="number" class="form-control" x-bind:id="'child_age_' + index" x-model="form.age" name="age[]" min="1" required readonly>
                @error('age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="gender">Gender</label>
                <select class="form-control" x-bind:id="'child_gender_' + index" name="gender[]" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div>
                <label for="grade">Grade</label>
                <select class="form-control" x-bind:id="'child_grade_' + index" name="grade[]" required>
                    <option value="">Select Grade</option>
                    <option value="kinder">Kinder</option>
                    <option value="Grade1">Grade 1</option>
                    <option value="Grade2">Grade 2</option>
                    <option value="Grade3">Grade 3</option>
                    <option value="Grade4">Grade 4</option>
                    <option value="Grade5">Grade 5</option>
                    <option value="Grade6">Grade 6</option>
                </select>
            </div>
            <div>
                <label for="section">Section</label>
                <select class="form-control" x-bind:id="'child_section_' + index" name="section[]" required>
                    <option value="">Select Section</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <button type="button" class="btn btn-danger mt-3" @click="forms.splice(index, 1)">Remove</button>
        </div>
    </template>
    <button type="button" class="btn btn-primary mt-3" @click="forms.push({ birthday: '', age: '' })">Add Another Form</button>
</div>

<script>
    function calculateAge(birthday) {
        if (!birthday) return '';
        const birthDate = new Date(birthday);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

 
</script>
