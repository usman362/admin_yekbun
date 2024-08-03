    <style>
        .avatar-xxl {
            width: 7.875rem !important;
            height: 7.875rem !important;
        }

        .avatar-border-lg {
            border: 0.1875rem solid #fff;
        }

        .avatar-circle {
            border-radius: 50% !important;
        }

        .avatar {
            position: relative;
            display: inline-block;
            /*width: 7.625rem;*/
            /*height: 7.625rem;*/
            border-radius: 0.3125rem;
        }

        label {
            color: #334257;
            text-transform: capitalize;
        }

        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .avatar-circle .avatar-img,
        .avatar-circle .avatar-initials {
            border-radius: 50%;
        }

        .avatar-img {
            display: block;
            max-width: 100% !important;
            height: 100% !important;
            -o-object-fit: cover;
            object-fit: cover;
            pointer-events: none;
            border-radius: 0.3125rem;
        }
    </style>

    <label class="avatar avatar-xxl avatar-circle avatar-border-lg" for="">
        <img id="viewer" onerror="this.src='https://efood-admin.6amtech.com/public/assets/admin/img/160x160/img1.jpg'" class="avatar-img" src="http://127.0.0.1:2002/storage/images/user/66acfdc448341___Screenshot_2024-07-31_at_12.36.24_PM.png" alt="Image">
    </label>
