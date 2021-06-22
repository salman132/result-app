<template>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <div class="text-success">
                    Name: Salman Rahman Auvi
                </div>
                <div class="text-right">
                    <a class="text-danger ">
                        logout
                    </a>
                </div>
            </div>
            <h5>Age: 20</h5>
            <h6>HSC 2021</h6>
        </div>
        <div class="card-body">
            <table class="table table-success">
                <tbody>
                    <tr>
                        <th>Subject</th>
                        <th>Score</th>
                        <th>Grade</th>
                    </tr>

                    <tr>
                        <th>English</th>
                        <td>Score</td>
                        <td>Grade</td>
                    </tr>
                    <tr>
                        <th>Math</th>
                        <td>Score</td>
                        <td>Grade</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Results"
}
</script>

<style scoped>

</style>
