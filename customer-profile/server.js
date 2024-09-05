const express = require('express');
const multer = require('multer');
const path = require('path');
const fs = require('fs');

const app = express();
const PORT = 3000;

app.use(express.static('public'));
app.use(express.json());

let userData = {
    username: 'JohnDoe',
    email: 'johndoe@example.com',
    profilePicUrl: '/uploads/default-avatar.png',
    orders: [
        { productName: 'Electric Surge', productImageUrl: '/uploads/product1.png', date: '2024-09-01', status: 'Delivered' },
        { productName: 'Citrus Shock', productImageUrl: '/uploads/product2.png', date: '2024-08-20', status: 'Shipped' },
    ]
};

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'uploads/');
    },
    filename: (req, file, cb) => {
        cb(null, `${Date.now()}_${file.originalname}`);
    }
});

const upload = multer({ storage: storage });

app.get('/api/user/profile', (req, res) => {
    res.json(userData);
});

app.post('/api/user/upload', upload.single('profileImg'), (req, res) => {
    if (req.file) {
        // Delete old profile picture if not default
        if (userData.profilePicUrl !== '/uploads/default-avatar.png') {
            fs.unlinkSync(path.join(__dirname, 'public', userData.profilePicUrl));
        }

        // Update user data with new profile picture
        userData.profilePicUrl = `/uploads/${req.file.filename}`;
        res.json({ success: true, newProfilePicUrl: userData.profilePicUrl });
    } else {
        res.status(400).json({ success: false });
    }
});

app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
