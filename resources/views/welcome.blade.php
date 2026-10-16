<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ado Special Live World Tour - Ticket Pass & Reservation</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Shippori+Mincho:wght@600;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        ado: {
                            deep: '#030712',
                            night: '#080d1e',
                            navy: '#0f172a',
                            royal: '#1e1b4b',
                            blue: '#1d4ed8',
                            cyan: '#06b6d4',
                            electric: '#00f0ff',
                            rose: '#e11d48',
                            glow: '#38bdf8'
                        }
                    },
                    fontFamily: {
                        cinzel: ['Cinzel', 'serif'],
                        jp: ['Shippori Mincho', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow-pulse': 'glowPulse 2s ease-in-out infinite alternate',
                        'flame': 'flame 1.5s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        glowPulse: {
                            '0%': { filter: 'drop-shadow(0 0 5px rgba(0, 240, 255, 0.4))' },
                            '100%': { filter: 'drop-shadow(0 0 20px rgba(0, 240, 255, 0.8))' },
                        },
                        flame: {
                            '0%': { transform: 'scale(1) rotate(-1deg)', opacity: '0.8' },
                            '100%': { transform: 'scale(1.05) rotate(1deg)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Gothic & Blue Flame Aesthetic Enhancements */
        body {
            background-color: #030712;
            color: #f3f4f6;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(6, 182, 212, 0.12) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(225, 29, 72, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(30, 27, 75, 0.3) 0%, transparent 70%);
            background-attachment: fixed;
        }

        .glass-panel {
            background: rgba(8, 13, 30, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 240, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            border-color: rgba(0, 240, 255, 0.5);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.25);
            transform: translateY(-2px);
        }

        .glass-card.selected {
            background: rgba(30, 27, 75, 0.85);
            border-color: #00f0ff;
            box-shadow: 0 0 25px rgba(0, 240, 255, 0.4), inset 0 0 15px rgba(0, 240, 255, 0.15);
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.6), 0 0 20px rgba(0, 240, 255, 0.3);
        }

        .text-glow-rose {
            text-shadow: 0 0 10px rgba(225, 29, 72, 0.6), 0 0 20px rgba(225, 29, 72, 0.3);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #030712;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e1b4b;
            border-radius: 4px;
            border: 1px solid rgba(0, 240, 255, 0.2);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #06b6d4;
        }

        /* Seat SVG Map styling */
        .seat-zone {
            cursor: pointer;
            transition: all 0.25s ease;
        }
        .seat-zone:hover {
            filter: brightness(1.3) drop-shadow(0 0 8px rgba(0, 240, 255, 0.8));
        }
        .seat-zone.active {
            stroke: #ffffff;
            stroke-width: 3px;
            filter: drop-shadow(0 0 12px rgba(0, 240, 255, 1));
        }

        /* Custom Checkbox / Radio styling */
        .custom-checkbox:checked {
            background-color: #06b6d4;
            border-color: #00f0ff;
            box-shadow: 0 0 10px rgba(0, 240, 255, 0.5);
        }
    </style>
</head>
<body class="min-h-screen font-sans flex flex-col justify-between selection:bg-ado-cyan selection:text-ado-deep">

    <!-- Glowing Top Accent Bar -->
    <div class="h-1 w-full bg-gradient-to-r from-ado-rose via-ado-electric to-ado-blue shadow-[0_0_15px_#00f0ff]"></div>

    <!-- Header / Navigation -->
    <header class="container mx-auto px-4 py-6 flex flex-wrap justify-between items-center relative z-10 border-b border-ado-cyan/10">
        <div class="flex items-center space-x-3">
            <div class="relative flex items-center justify-center w-12 h-12 rounded-full bg-ado-royal border border-ado-electric/40 text-ado-electric shadow-[0_0_15px_rgba(0,240,255,0.3)]">
                <i class="fa-solid fa-rose text-xl text-ado-electric animate-pulse"></i>
            </div>
            <div>
                <h1 class="font-cinzel text-2xl md:text-3xl font-extrabold tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-white via-ado-electric to-ado-cyan">
                    ADO <span class="font-jp text-lg font-normal text-ado-rose/90 ml-1">アド</span>
                </h1>
                <p class="text-xs font-mono tracking-widest text-gray-400 uppercase">WORLD TOUR 'HIBANA' RESERVATION</p>
            </div>
        </div>

        <div class="mt-4 md:mt-0 flex items-center space-x-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-ado-cyan/10 text-ado-cyan border border-ado-cyan/30 shadow-inner">
                <span class="w-2 h-2 rounded-full bg-ado-electric animate-ping mr-2"></span>
                OFFICIAL TICKETING OPEN
            </span>
            <div class="text-right hidden sm:block">
                <p class="text-xs text-gray-400">Pia Arena MM / Tokyo Dome</p>
                <p class="text-xs text-ado-electric font-mono">2026.11.14 - 11.15</p>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="container mx-auto px-4 py-8 max-w-6xl relative z-10 flex-grow">

        <!-- Tour Banner / Hero Heading -->
        <div class="relative overflow-hidden rounded-2xl glass-panel p-6 md:p-8 mb-8 border border-ado-cyan/20">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-ado-cyan/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-10 -top-10 w-64 h-64 bg-ado-rose/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <div class="inline-block px-3 py-1 rounded bg-ado-rose/20 text-ado-rose text-xs font-bold uppercase tracking-widest mb-3 border border-ado-rose/40">
                        <i class="fa-solid fa-fire-flame-curved mr-1"></i> Special Live Event
                    </div>
                    <h2 class="font-cinzel text-3xl md:text-5xl font-black text-white tracking-wider leading-tight">
                        SPECIAL LIVE <span class="text-transparent bg-clip-text bg-gradient-to-r from-ado-electric to-blue-400 text-glow">"HIBANA"</span>
                    </h2>
                    <p class="font-jp text-gray-300 text-sm md:text-base mt-2 max-w-2xl">
                        Ado Official World Tour - Live Concert Pass & Exclusive Merchandise Reservation Portal. Experience the blue flame live in concert.
                    </p>
                </div>

                <!-- Countdown Timer -->
                <div class="glass-card p-4 rounded-xl border border-ado-electric/30 min-w-[240px] text-center">
                    <p class="text-xs font-mono uppercase tracking-wider text-ado-cyan mb-1">Ticket Sales Closing In</p>
                    <div class="flex justify-center space-x-3 text-lg font-bold font-mono text-white">
                        <div><span id="timer-hours" class="text-2xl text-ado-electric">08</span><span class="text-xs block font-sans text-gray-400">HRS</span></div>
                        <span class="text-ado-electric">:</span>
                        <div><span id="timer-mins" class="text-2xl text-ado-electric">42</span><span class="text-xs block font-sans text-gray-400">MIN</span></div>
                        <span class="text-ado-electric">:</span>
                        <div><span id="timer-secs" class="text-2xl text-ado-rose">19</span><span class="text-xs block font-sans text-gray-400">SEC</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Wrapper -->
        <form id="ado-booking-form" onsubmit="handleFormSubmit(event)" class="space-y-8">

            <!-- STEP 1: Interactive Seat & Ticket Category Selection -->
            <section class="glass-panel p-6 md:p-8 rounded-2xl border border-ado-cyan/20">
                <div class="flex items-center space-x-3 mb-6 pb-3 border-b border-ado-cyan/15">
                    <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-ado-electric/20 text-ado-electric font-bold text-sm border border-ado-electric/40">1</span>
                    <h3 class="font-cinzel text-xl md:text-2xl font-bold text-white tracking-wide">Select Ticket Tier & Seating Zone</h3>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <!-- Ticket Cards (Left side) -->
                    <div class="lg:col-span-7 space-y-4">
                        
                        <!-- VIP Rose Pass -->
                        <div onclick="selectTier('VIP', 220, 'zone-vip')" id="tier-card-VIP" class="glass-card p-5 rounded-xl border cursor-pointer selected transition-all relative overflow-hidden group">
                            <div class="absolute top-0 right-0 bg-gradient-to-l from-ado-rose to-transparent px-3 py-1 text-[10px] font-bold text-white uppercase tracking-wider rounded-bl">
                                Popular / Limited
                            </div>
                            <div class="flex justify-between items-start">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-ado-rose/20 flex items-center justify-center text-ado-rose border border-ado-rose/40 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-crown text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-cinzel font-bold text-lg text-white">VIP Blue Rose Pass</h4>
                                        <p class="text-xs text-gray-400">Front Stage Floor (Zone A) + VIP Laminate & Fast Track Entry</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold font-mono text-ado-electric">$220</span>
                                    <span class="text-xs block text-gray-400">/ ticket</span>
                                </div>
                            </div>
                        </div>

                        <!-- Standing Rose Arena -->
                        <div onclick="selectTier('STANDING', 145, 'zone-standing')" id="tier-card-STANDING" class="glass-card p-5 rounded-xl border cursor-pointer transition-all relative overflow-hidden group">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-ado-cyan/20 flex items-center justify-center text-ado-cyan border border-ado-cyan/40 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-fire text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-cinzel font-bold text-lg text-white">Standing Rose Arena</h4>
                                        <p class="text-xs text-gray-400">Main Arena Floor Standing Area (Zone B) - High Energy</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold font-mono text-ado-electric">$145</span>
                                    <span class="text-xs block text-gray-400">/ ticket</span>
                                </div>
                            </div>
                        </div>

                        <!-- General Seating -->
                        <div onclick="selectTier('GENERAL', 85, 'zone-general')" id="tier-card-GENERAL" class="glass-card p-5 rounded-xl border cursor-pointer transition-all relative overflow-hidden group">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 border border-indigo-500/40 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-chair text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-cinzel font-bold text-lg text-white">General Reserved Seating</h4>
                                        <p class="text-xs text-gray-400">Tiered Balcony Reserved Seating (Zone C) - Great Stage View</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold font-mono text-ado-electric">$85</span>
                                    <span class="text-xs block text-gray-400">/ ticket</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Interactive Seating Map SVG (Right side) -->
                    <div class="lg:col-span-5 flex flex-col items-center justify-center bg-ado-deep/80 p-6 rounded-xl border border-ado-cyan/20 shadow-inner">
                        <div class="w-full text-center mb-3">
                            <span class="text-xs font-mono text-ado-electric uppercase tracking-widest"><i class="fa-solid fa-map-location-dot mr-1"></i> Interactive Arena Map</span>
                        </div>

                        <svg viewBox="0 0 400 320" class="w-full max-w-xs h-auto filter drop-shadow-[0_0_15px_rgba(0,0,0,0.8)]">
                            <!-- STAGE AREA -->
                            <rect x="100" y="20" width="200" height="35" rx="6" fill="#1e1b4b" stroke="#00f0ff" stroke-width="2" />
                            <text x="200" y="42" fill="#00f0ff" font-family="Cinzel" font-size="12" font-weight="bold" text-anchor="middle" letter-spacing="2">STAGE / Ado Cage</text>

                            <!-- VIP ZONE A -->
                            <path id="zone-vip" onclick="selectTier('VIP', 220, 'zone-vip')" class="seat-zone active" d="M 110,65 L 290,65 L 280,125 L 120,125 Z" fill="#e11d48" fill-opacity="0.4" stroke="#e11d48" stroke-width="1.5" />
                            <text x="200" y="100" fill="#ffffff" font-family="Plus Jakarta Sans" font-size="11" font-weight="bold" text-anchor="middle" pointer-events="none">VIP ZONE A</text>

                            <!-- STANDING ZONE B -->
                            <path id="zone-standing" onclick="selectTier('STANDING', 145, 'zone-standing')" class="seat-zone" d="M 90,135 L 310,135 L 330,210 L 70,210 Z" fill="#06b6d4" fill-opacity="0.3" stroke="#06b6d4" stroke-width="1.5" />
                            <text x="200" y="178" fill="#ffffff" font-family="Plus Jakarta Sans" font-size="11" font-weight="bold" text-anchor="middle" pointer-events="none">STANDING ZONE B</text>

                            <!-- BALCONY ZONE C -->
                            <path id="zone-general" onclick="selectTier('GENERAL', 85, 'zone-general')" class="seat-zone" d="M 50,220 L 350,220 L 370,290 L 30,290 Z" fill="#4f46e5" fill-opacity="0.3" stroke="#6366f1" stroke-width="1.5" />
                            <text x="200" y="260" fill="#ffffff" font-family="Plus Jakarta Sans" font-size="11" font-weight="bold" text-anchor="middle" pointer-events="none">BALCONY ZONE C</text>
                        </svg>

                        <div class="mt-4 flex items-center justify-center space-x-4 text-[11px] font-mono text-gray-400">
                            <span class="flex items-center"><span class="w-3 h-3 rounded bg-ado-rose/60 border border-ado-rose mr-1"></span> VIP</span>
                            <span class="flex items-center"><span class="w-3 h-3 rounded bg-ado-cyan/60 border border-ado-cyan mr-1"></span> Standing</span>
                            <span class="flex items-center"><span class="w-3 h-3 rounded bg-indigo-500/60 border border-indigo-400 mr-1"></span> Balcony</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- STEP 2: Buyer Information Form -->
            <section class="glass-panel p-6 md:p-8 rounded-2xl border border-ado-cyan/20">
                <div class="flex items-center space-x-3 mb-6 pb-3 border-b border-ado-cyan/15">
                    <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-ado-electric/20 text-ado-electric font-bold text-sm border border-ado-electric/40">2</span>
                    <h3 class="font-cinzel text-xl md:text-2xl font-bold text-white tracking-wide">Attendee Information</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Full Name -->
                    <div>
                        <label for="fullName" class="block text-xs font-mono uppercase tracking-wider text-gray-300 mb-2">
                            Full Name <span class="text-ado-rose">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <input type="text" id="fullName" required placeholder="e.g. Ado Fanatic" 
                                class="w-full pl-10 pr-4 py-3 bg-ado-deep/90 border border-ado-cyan/30 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-ado-electric focus:ring-1 focus:ring-ado-electric transition-all text-sm" />
                        </div>
                        <p id="fullName-error" class="hidden text-ado-rose text-xs mt-1">Please enter your full name.</p>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-xs font-mono uppercase tracking-wider text-gray-300 mb-2">
                            Email Address <span class="text-ado-rose">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <input type="email" id="email" required placeholder="e.g. ado@utaites.jp" 
                                class="w-full pl-10 pr-4 py-3 bg-ado-deep/90 border border-ado-cyan/30 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-ado-electric focus:ring-1 focus:ring-ado-electric transition-all text-sm" />
                        </div>
                        <p id="email-error" class="hidden text-ado-rose text-xs mt-1">Please enter a valid email address.</p>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone" class="block text-xs font-mono uppercase tracking-wider text-gray-300 mb-2">
                            Phone Number <span class="text-ado-rose">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </div>
                            <input type="tel" id="phone" required placeholder="+81 90 1234 5678" 
                                class="w-full pl-10 pr-4 py-3 bg-ado-deep/90 border border-ado-cyan/30 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-ado-electric focus:ring-1 focus:ring-ado-electric transition-all text-sm" />
                        </div>
                        <p id="phone-error" class="hidden text-ado-rose text-xs mt-1">Please enter a valid phone number.</p>
                    </div>

                    <!-- Ticket Quantity -->
                    <div>
                        <label for="quantity" class="block text-xs font-mono uppercase tracking-wider text-gray-300 mb-2">
                            Ticket Quantity (Max 4) <span class="text-ado-rose">*</span>
                        </label>
                        <div class="flex items-center space-x-3 bg-ado-deep/90 border border-ado-cyan/30 rounded-xl p-1.5">
                            <button type="button" onclick="adjustQuantity(-1)" class="w-10 h-10 rounded-lg bg-ado-royal text-ado-electric font-bold hover:bg-ado-cyan/20 transition-colors flex items-center justify-center">
                                <i class="fa-solid fa-minus text-xs"></i>
                            </button>
                            <span id="quantity-display" class="flex-1 text-center font-mono text-lg font-bold text-white">1</span>
                            <button type="button" onclick="adjustQuantity(1)" class="w-10 h-10 rounded-lg bg-ado-royal text-ado-electric font-bold hover:bg-ado-cyan/20 transition-colors flex items-center justify-center">
                                <i class="fa-solid fa-plus text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Preferred Show Date -->
                    <div>
                        <label for="showDate" class="block text-xs font-mono uppercase tracking-wider text-gray-300 mb-2">
                            Concert Date <span class="text-ado-rose">*</span>
                        </label>
                        <div class="relative">
                            <select id="showDate" class="w-full px-4 py-3 bg-ado-deep/90 border border-ado-cyan/30 rounded-xl text-white focus:outline-none focus:border-ado-electric focus:ring-1 focus:ring-ado-electric transition-all text-sm appearance-none">
                                <option value="2026-11-14">Day 1: Nov 14, 2026 (Sat) - 18:00 JST</option>
                                <option value="2026-11-15">Day 2: Nov 15, 2026 (Sun) - 17:00 JST</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-500">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- STEP 3: Exclusive Merchandise Add-ons -->
            <section class="glass-panel p-6 md:p-8 rounded-2xl border border-ado-cyan/20">
                <div class="flex items-center space-x-3 mb-6 pb-3 border-b border-ado-cyan/15">
                    <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-ado-electric/20 text-ado-electric font-bold text-sm border border-ado-electric/40">3</span>
                    <h3 class="font-cinzel text-xl md:text-2xl font-bold text-white tracking-wide">Official Tour Merchandise Pre-Orders</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Addon 1: Rose Lightstick -->
                    <div class="glass-card p-4 rounded-xl border flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-lg bg-ado-cyan/10 border border-ado-cyan/30 flex items-center justify-center text-ado-electric text-2xl">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Blue Rose Penlight</h4>
                                <p class="text-xs text-gray-400">Bluetooth Sync Penlight</p>
                                <span class="text-sm font-mono font-semibold text-ado-electric">+$35</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="addon-lightstick" onchange="calculateTotal()" class="sr-only peer">
                            <div class="w-11 h-6 bg-ado-deep peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-ado-cyan"></div>
                        </label>
                    </div>

                    <!-- Addon 2: Tour Hoodie -->
                    <div class="glass-card p-4 rounded-xl border flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-lg bg-ado-rose/10 border border-ado-rose/30 flex items-center justify-center text-ado-rose text-2xl">
                                <i class="fa-solid fa-shirt"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">'HIBANA' Tour Hoodie</h4>
                                <p class="text-xs text-gray-400">Heavyweight Gothic Print</p>
                                <span class="text-sm font-mono font-semibold text-ado-electric">+$75</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="addon-hoodie" onchange="calculateTotal()" class="sr-only peer">
                            <div class="w-11 h-6 bg-ado-deep peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-ado-cyan"></div>
                        </label>
                    </div>

                    <!-- Addon 3: Memorial Pamphlet -->
                    <div class="glass-card p-4 rounded-xl border flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-lg bg-indigo-500/10 border border-indigo-500/30 flex items-center justify-center text-indigo-400 text-2xl">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Art Photobook</h4>
                                <p class="text-xs text-gray-400">Concept Art & Commentary</p>
                                <span class="text-sm font-mono font-semibold text-ado-electric">+$25</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="addon-book" onchange="calculateTotal()" class="sr-only peer">
                            <div class="w-11 h-6 bg-ado-deep peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-ado-cyan"></div>
                        </label>
                    </div>

                </div>
            </section>

            <!-- STEP 4: Promo Code & Price Breakdown Summary -->
            <section class="glass-panel p-6 md:p-8 rounded-2xl border border-ado-cyan/20">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Promo Code Input -->
                    <div class="lg:col-span-5 space-y-3">
                        <label class="block text-xs font-mono uppercase tracking-wider text-gray-300">
                            Discount / Fanclub Code
                        </label>
                        <div class="flex space-x-2">
                            <input type="text" id="promoCode" placeholder="Try code 'ADO2026' or 'AISHITE'" class="flex-1 px-4 py-3 bg-ado-deep/90 border border-ado-cyan/30 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-ado-electric text-sm uppercase font-mono">
                            <button type="button" onclick="applyPromoCode()" class="px-5 py-3 bg-ado-royal hover:bg-ado-blue border border-ado-cyan/40 text-ado-electric font-bold text-sm rounded-xl transition-all shadow-md">
                                Apply
                            </button>
                        </div>
                        <p id="promo-message" class="text-xs mt-1 font-mono hidden"></p>
                    </div>

                    <!-- Total Breakdown -->
                    <div class="lg:col-span-7 bg-ado-deep/80 p-5 rounded-xl border border-ado-cyan/20 space-y-2">
                        <div class="flex justify-between text-xs text-gray-400 font-mono">
                            <span>Tickets (<span id="summary-tier">VIP Blue Rose Pass</span> x <span id="summary-qty">1</span>)</span>
                            <span id="summary-ticket-price" class="text-white">$220.00</span>
                        </div>
                        <div class="flex justify-between text-xs text-gray-400 font-mono">
                            <span>Merchandise Total</span>
                            <span id="summary-addon-price" class="text-white">$0.00</span>
                        </div>
                        <div id="discount-row" class="hidden flex justify-between text-xs text-ado-rose font-mono">
                            <span>Fanclub Discount</span>
                            <span id="summary-discount">-$0.00</span>
                        </div>
                        <div class="border-t border-ado-cyan/20 pt-3 flex justify-between items-center">
                            <div>
                                <span class="text-xs font-mono uppercase text-gray-400 block">Total Payable Amount</span>
                                <span class="text-xs text-ado-cyan font-jp">Tax included</span>
                            </div>
                            <span id="summary-grand-total" class="font-mono text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-ado-electric to-blue-400 text-glow">
                                $220.00
                            </span>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Submit Button -->
            <div class="text-center pt-2">
                <button type="submit" class="w-full md:w-auto px-12 py-5 rounded-2xl bg-gradient-to-r from-ado-cyan via-ado-blue to-ado-rose hover:from-ado-electric hover:to-ado-rose text-white font-cinzel font-black text-lg tracking-widest uppercase shadow-[0_0_30px_rgba(0,240,255,0.4)] hover:shadow-[0_0_45px_rgba(0,240,255,0.7)] transform hover:-translate-y-1 transition-all duration-300">
                    <i class="fa-solid fa-ticket mr-2"></i> Confirm & Generate Digital Ticket Pass
                </button>
            </div>

        </form>

    </main>

    <!-- CONFIRMATION / RECEIPT MODAL -->
    <div id="receipt-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md hidden transition-opacity duration-300">
        <div class="relative w-full max-w-2xl glass-panel p-6 md:p-8 rounded-3xl border-2 border-ado-electric shadow-[0_0_50px_rgba(0,240,255,0.5)] overflow-hidden animate-float">
            
            <!-- Glow background decor -->
            <div class="absolute -right-20 -top-20 w-48 h-48 bg-ado-electric/20 rounded-full blur-2xl"></div>

            <button onclick="closeModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-ado-deep border border-ado-cyan/30 text-gray-400 hover:text-white flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-ado-electric/20 text-ado-electric text-3xl mb-3 border border-ado-electric shadow-[0_0_20px_rgba(0,240,255,0.6)]">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h3 class="font-cinzel text-2xl md:text-3xl font-black text-white tracking-widest">RESERVATION CONFIRMED</h3>
                <p class="text-xs font-mono text-ado-cyan mt-1">ADO WORLD TOUR 'HIBANA' OFFICIAL DIGITAL PASS</p>
            </div>

            <!-- Stylized Ticket Pass Layout -->
            <div id="ticket-pass-content" class="bg-gradient-to-br from-ado-night to-ado-royal p-6 rounded-2xl border border-ado-cyan/40 relative overflow-hidden space-y-4">
                
                <!-- Watermark Decor -->
                <div class="absolute right-4 bottom-2 text-6xl font-jp opacity-5 font-black text-white pointer-events-none">
                    残夢
                </div>

                <div class="flex justify-between items-start border-b border-ado-cyan/20 pb-4">
                    <div>
                        <span class="text-[10px] font-mono text-gray-400 uppercase tracking-widest block">Attendee</span>
                        <span id="modal-name" class="font-bold text-lg text-white">Ado Fan</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] font-mono text-gray-400 uppercase tracking-widest block">Pass ID</span>
                        <span id="modal-pass-id" class="font-mono font-bold text-sm text-ado-electric">ADO-8829-2026</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 py-2 text-xs">
                    <div>
                        <span class="text-gray-400 block font-mono">Date</span>
                        <span id="modal-date" class="font-bold text-white">2026.11.14</span>
                    </div>
                    <div>
                        <span class="text-gray-400 block font-mono">Tier Zone</span>
                        <span id="modal-tier" class="font-bold text-ado-rose">VIP Blue Rose Pass</span>
                    </div>
                    <div>
                        <span class="text-gray-400 block font-mono">Quantity</span>
                        <span id="modal-qty" class="font-bold text-white">1 Pass</span>
                    </div>
                </div>

                <!-- Addons List -->
                <div class="border-t border-ado-cyan/20 pt-3">
                    <span class="text-[10px] font-mono text-gray-400 uppercase tracking-widest block mb-1">Merchandise Add-Ons</span>
                    <p id="modal-addons" class="text-xs text-gray-300 font-mono">None selected</p>
                </div>

                <!-- Price and Barcode -->
                <div class="border-t border-ado-cyan/20 pt-4 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div>
                        <span class="text-[10px] font-mono text-gray-400 uppercase tracking-widest block">Total Paid</span>
                        <span id="modal-total" class="font-mono text-2xl font-black text-ado-electric">$220.00</span>
                    </div>
                    
                    <!-- Generated Mock QR/Barcode -->
                    <div class="flex flex-col items-center">
                        <div class="bg-white p-2 rounded-lg flex space-x-1">
                            <div class="w-2 h-8 bg-black"></div>
                            <div class="w-1 h-8 bg-black"></div>
                            <div class="w-3 h-8 bg-black"></div>
                            <div class="w-1 h-8 bg-black"></div>
                            <div class="w-2 h-8 bg-black"></div>
                            <div class="w-4 h-8 bg-black"></div>
                            <div class="w-1 h-8 bg-black"></div>
                        </div>
                        <span class="text-[9px] font-mono text-gray-400 mt-1">VERIFIED TICKET CODE</span>
                    </div>
                </div>

            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                <button onclick="downloadPass()" class="flex-1 py-3 bg-ado-electric text-ado-deep font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-white transition-colors flex items-center justify-center">
                    <i class="fa-solid fa-download mr-2"></i> Save Ticket Pass
                </button>
                <button onclick="closeModal()" class="flex-1 py-3 bg-ado-deep border border-ado-cyan/30 text-white font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-ado-royal transition-colors">
                    Done
                </button>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="container mx-auto px-4 py-8 mt-12 border-t border-ado-cyan/10 text-center text-xs text-gray-500 font-mono relative z-10">
        <p>© 2026 Universal Music Japan / Cloud Nine Inc. Fan Concept Ticket Site for Ado World Tour.</p>
        <p class="mt-1 text-gray-600">Designed with Royal Blue Flame & Rose Aesthetics.</p>
    </footer>

    <!-- Interactive JavaScript Logic -->
    <script>
        // State variables
        let selectedTier = 'VIP';
        let basePrice = 220;
        let quantity = 1;
        let discountPercent = 0;

        // Pricing Configuration
        const prices = {
            VIP: 220,
            STANDING: 145,
            GENERAL: 85,
            lightstick: 35,
            hoodie: 75,
            book: 25
        };

        // Select Ticket Tier
        function selectTier(tierName, price, svgZoneId) {
            selectedTier = tierName;
            basePrice = price;

            // Highlight tier card
            ['VIP', 'STANDING', 'GENERAL'].forEach(t => {
                const card = document.getElementById(`tier-card-${t}`);
                if (t === tierName) {
                    card.classList.add('selected');
                } else {
                    card.classList.remove('selected');
                }
            });

            // Highlight SVG map zone
            document.querySelectorAll('.seat-zone').forEach(zone => {
                zone.classList.remove('active');
            });
            const selectedSvgZone = document.getElementById(svgZoneId);
            if (selectedSvgZone) {
                selectedSvgZone.classList.add('active');
            }

            calculateTotal();
        }

        // Adjust Quantity
        function adjustQuantity(delta) {
            quantity = Math.max(1, Math.min(4, quantity + delta));
            document.getElementById('quantity-display').textContent = quantity;
            calculateTotal();
        }

        // Apply Promo Code Logic
        function applyPromoCode() {
            const codeInput = document.getElementById('promoCode').value.trim().toUpperCase();
            const msgEl = document.getElementById('promo-message');
            const discountRow = document.getElementById('discount-row');

            if (codeInput === 'ADO2026' || codeInput === 'AISHITE') {
                discountPercent = 0.15; // 15% discount
                msgEl.textContent = "Promo Applied: 15% Fanclub Discount Activated!";
                msgEl.className = "text-xs mt-1 font-mono text-ado-cyan block";
                discountRow.classList.remove('hidden');
            } else if (codeInput === '') {
                discountPercent = 0;
                msgEl.className = "hidden";
                discountRow.classList.add('hidden');
            } else {
                discountPercent = 0;
                msgEl.textContent = "Invalid Promo Code. Try 'ADO2026'";
                msgEl.className = "text-xs mt-1 font-mono text-ado-rose block";
                discountRow.classList.add('hidden');
            }

            calculateTotal();
        }

        // Real-Time Total Calculator
        function calculateTotal() {
            // Addons
            let addonTotal = 0;
            if (document.getElementById('addon-lightstick').checked) addonTotal += prices.lightstick;
            if (document.getElementById('addon-hoodie').checked) addonTotal += prices.hoodie;
            if (document.getElementById('addon-book').checked) addonTotal += prices.book;

            const totalAddonsPrice = addonTotal * quantity;
            const subtotalTickets = basePrice * quantity;
            const grossTotal = subtotalTickets + totalAddonsPrice;
            const discountAmount = grossTotal * discountPercent;
            const grandTotal = grossTotal - discountAmount;

            // Update UI elements
            document.getElementById('summary-tier').textContent = selectedTier + " Pass";
            document.getElementById('summary-qty').textContent = quantity;
            document.getElementById('summary-ticket-price').textContent = `$${subtotalTickets.toFixed(2)}`;
            document.getElementById('summary-addon-price').textContent = `$${totalAddonsPrice.toFixed(2)}`;
            document.getElementById('summary-discount').textContent = `-$${discountAmount.toFixed(2)}`;
            document.getElementById('summary-grand-total').textContent = `$${grandTotal.toFixed(2)}`;
        }

        // Form Validation & Submission
        function handleFormSubmit(event) {
            event.preventDefault();

            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();

            let isValid = true;

            if (!fullName) {
                document.getElementById('fullName-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('fullName-error').classList.add('hidden');
            }

            if (!email || !email.includes('@')) {
                document.getElementById('email-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('email-error').classList.add('hidden');
            }

            if (!phone) {
                document.getElementById('phone-error').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('phone-error').classList.add('hidden');
            }

            if (isValid) {
                populateAndShowReceipt(fullName);
            }
        }

        // Show Modal with Generated Ticket Details
        function populateAndShowReceipt(name) {
            const dateVal = document.getElementById('showDate').value;
            const totalText = document.getElementById('summary-grand-total').textContent;

            // Compile Addons text
            let addons = [];
            if (document.getElementById('addon-lightstick').checked) addons.push('Blue Rose Lightstick');
            if (document.getElementById('addon-hoodie').checked) addons.push('Tour Hoodie');
            if (document.getElementById('addon-book').checked) addons.push('Art Photobook');

            const addonsStr = addons.length > 0 ? addons.join(', ') : 'No pre-order items';

            // Random Pass ID
            const randomId = 'ADO-' + Math.floor(1000 + Math.random() * 9000) + '-2026';

            // Populate Modal Fields
            document.getElementById('modal-name').textContent = name;
            document.getElementById('modal-pass-id').textContent = randomId;
            document.getElementById('modal-date').textContent = dateVal;
            document.getElementById('modal-tier').textContent = selectedTier + ' Tier';
            document.getElementById('modal-qty').textContent = `${quantity} Ticket(s)`;
            document.getElementById('modal-addons').textContent = addonsStr;
            document.getElementById('modal-total').textContent = totalText;

            // Display Modal
            document.getElementById('receipt-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('receipt-modal').classList.add('hidden');
        }

        // Mock Download Pass action
        function downloadPass() {
            const passText = `Ado Concert Digital Ticket Pass\nPass ID: ${document.getElementById('modal-pass-id').textContent}\nAttendee: ${document.getElementById('modal-name').textContent}\nDate: ${document.getElementById('modal-date').textContent}`;
            const element = document.createElement('a');
            const file = new Blob([passText], {type: 'text/plain'});
            element.href = URL.createObjectURL(file);
            element.download = "Ado_Concert_Pass.txt";
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
        }

        // Countdown Timer Logic
        function startCountdown() {
            let totalSeconds = 8 * 3600 + 42 * 60 + 19;
            setInterval(() => {
                if (totalSeconds <= 0) return;
                totalSeconds--;
                const hrs = Math.floor(totalSeconds / 3600);
                const mins = Math.floor((totalSeconds % 3600) / 60);
                const secs = totalSeconds % 60;

                document.getElementById('timer-hours').textContent = String(hrs).padStart(2, '0');
                document.getElementById('timer-mins').textContent = String(mins).padStart(2, '0');
                document.getElementById('timer-secs').textContent = String(secs).padStart(2, '0');
            }, 1000);
        }

        // Initialize on Load
        window.onload = function() {
            startCountdown();
            calculateTotal();
        };
    </script>
</body>
</html>