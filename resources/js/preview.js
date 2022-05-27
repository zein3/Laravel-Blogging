/**
 * Javascript for previewing profile pictures.
 */

const preview = document.querySelector('#preview_profile_picture');
const profilePicture = document.querySelector('#profile_picture');

profilePicture.addEventListener('change', () => {
    console.log('here!');
    preview.src = URL.createObjectURL(profilePicture.files[0]);
    preview.classList.remove('d-none');
    preview.onload = () => {
        URL.revokeObjectURL(preview.src);
    };
});
