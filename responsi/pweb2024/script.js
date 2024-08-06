function validateForm() {
    let nim = document.getElementById("nim").value;
    let email = document.getElementById("email").value;
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (!/^\d+$/.test(nim)) {
        alert("Nomor Induk Mahasiswa harus berupa angka.");
        return false;
    }

    if (!emailPattern.test(email)) {
        alert("Email tidak valid.");
        return false;
    }

    return true;
}
