# Development Plan — Dharma Sentosa Nusantara

Professional multi-page website for an IT solutions company, with admin login and CMS.

**Stack:** Laravel 11 (Blade) + Tailwind CSS + Filament v3 (admin/CMS) + MySQL

---

## 1. Architecture Overview

Two clearly separated sides in one Laravel app:

- **Frontend (public)** — Blade + Tailwind, SEO-optimized, server-rendered.
- **Backend (admin)** — Filament v3 panel at `/admin`, login-protected, manages all content.

Content flow: **Admin edits in Filament → stored in DB → rendered by Blade pages.**

---

## 2. Project Structure

```
dharma-sentosa-nusantara/
├── app/
│   ├── Filament/
│   │   ├── Resources/
│   │   │   ├── ServiceResource.php
│   │   │   ├── CaseStudyResource.php
│   │   │   ├── TeamMemberResource.php
│   │   │   ├── TestimonialResource.php
│   │   │   ├── PartnerResource.php
│   │   │   ├── PostResource.php
│   │   │   └── ContactMessageResource.php
│   │   ├── Pages/
│   │   │   └── ManageSettings.php      # site-wide settings (logo, contact, socials)
│   │   └── Widgets/
│   │       └── ContactMessagesWidget.php
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── AboutController.php
│   │   ├── ServiceController.php       # index + show
│   │   ├── PortfolioController.php
│   │   ├── BlogController.php
│   │   └── ContactController.php
│   ├── Models/
│   │   ├── User.php                    # admins
│   │   ├── Service.php
│   │   ├── CaseStudy.php
│   │   ├── TeamMember.php
│   │   ├── Testimonial.php
│   │   ├── Partner.php
│   │   ├── Post.php                    # blog/news
│   │   ├── ContactMessage.php
│   │   └── Setting.php
│   ├── Mail/ContactInquiry.php
│   ├── Policies/                       # role-based authorization
│   └── View/Composers/
│       ├── NavComposer.php
│       └── SettingsComposer.php        # injects site settings everywhere
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── partials/
│   │   │   ├── header.blade.php
│   │   │   ├── footer.blade.php
│   │   │   └── seo-meta.blade.php
│   │   ├── components/
│   │   │   ├── hero.blade.php
│   │   │   ├── section-heading.blade.php
│   │   │   ├── service-card.blade.php
│   │   │   ├── case-study-card.blade.php
│   │   │   ├── testimonial.blade.php
│   │   │   ├── team-card.blade.php
│   │   │   ├── cta.blade.php
│   │   │   └── button.blade.php
│   │   └── pages/
│   │       ├── home.blade.php
│   │       ├── about.blade.php
│   │       ├── services/
│   │       │   ├── index.blade.php
│   │       │   └── show.blade.php
│   │       ├── portfolio/
│   │       │   ├── index.blade.php
│   │       │   └── show.blade.php
│   │       ├── blog/
│   │       │   ├── index.blade.php
│   │       │   └── show.blade.php
│   │       └── contact.blade.php
│   ├── css/app.css
│   └── js/app.js
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── AdminUserSeeder.php
│       ├── ServiceSeeder.php
│       └── DatabaseSeeder.php
├── public/images/
├── routes/
│   └── web.php
├── config/
│   ├── dsn.php
│   └── filament.php
├── tailwind.config.js
└── vite.config.js
```

---

## 3. Pages (Public) & Admin Modules

### Public pages (multi-page)

| Route | Page | Source |
|---|---|---|
| `/` | Home (hero, services preview, stats, process, portfolio teaser, testimonials, partners, CTA) | DB + settings |
| `/about` | Company story, vision/mission, team | DB (`team_members`) + settings |
| `/services` | All services list | DB (`services`) |
| `/services/{slug}` | Service detail | DB (`services`) |
| `/portfolio` | Case studies list | DB (`case_studies`) |
| `/portfolio/{slug}` | Case study detail | DB (`case_studies`) |
| `/blog` | News / insights list | DB (`posts`) |
| `/blog/{slug}` | Blog post detail | DB (`posts`) |
| `/contact` | Form + office info + map | Settings + form |
| `/privacy`, `/terms` | Legal | Static or DB-backed |

### Admin panel (Filament, `/admin`)

| Module | Fields |
|---|---|
| **Dashboard** | New messages, post stats, quick links |
| **Services** | title, slug, icon, short_desc, long_desc, image, order, is_featured |
| **Case Studies** | title, slug, client, category, cover, gallery, content, results, date |
| **Team Members** | name, role, photo, bio, socials, order |
| **Testimonials** | author, role, company, quote, photo, is_featured |
| **Partners** | name, logo, url, order |
| **Blog Posts** | title, slug, cover, excerpt, content (rich text), category, tags, author, published_at |
| **Contact Messages** | name, email, phone, message, is_read, replied_at (read-only + reply) |
| **Settings** | logo, favicon, company name, tagline, phone, email, address, map coords, socials, SEO defaults |
| **Users** | admin accounts, roles (super-admin / editor) |

---

## 4. Database Schema (core tables)

```
users                  → Filament admins (id, name, email, password, role)
services               → id, title, slug, icon, short_desc, content, image, order, is_featured
case_studies           → id, title, slug, client, category, cover, content, results, date
team_members           → id, name, role, photo, bio, socials(json), order
testimonials           → id, author, role, company, quote, photo, is_featured
partners               → id, name, logo, url, order
posts                  → id, title, slug, cover, excerpt, content, category, tags(json), author_id, published_at
contact_messages       → id, name, email, phone, message, is_read, replied_at
settings               → key, value (spatie/laravel-settings), OR single-row `site_settings` table
media                  → spatie/laravel-medialibrary (images per model)
```

All content models support **soft deletes** + **timestamps**. Slugs are auto-generated from title (unique).

---

## 5. Authentication & Authorization

- **Auth driver:** Laravel's built-in + Filament login at `/admin/login`.
- **No public registration** — admins created via seeder or by super-admin.
- **Roles** (via `spatie/laravel-permission`):
  - `super-admin` — full access, manages users & settings
  - `editor` — manages content (services, posts, case studies) but not users/settings
- **Policies** per model to enforce role access.
- **2FA optional** (Filament supports it via plugin).
- **Password reset** via email (Laravel default).

---

## 6. UI/UX Approach (Public Side)

**Aesthetic direction: "Trusted Craft" — established IT consultancy with quiet authority**

Inspired by: [Thoughtworks](https://www.thoughtworks.com), [Slalom](https://www.slalom.com), [Lemongrass](https://www.lemongrasscloud.com), [Publicis Sapient](https://www.publicissapient.com).
The design should feel like it was built by an in-house brand team — deliberate, restrained, and credible — not assembled from a Tailwind component library.

---

### Palette — Midnight & Amber

> **Rationale:** The saturated Tailwind `blue-800` (#1E40AF) is overused in AI-generated designs and reads as generic. A desaturated deep navy anchors authority without feeling cold. Amber gold is used across Indonesian corporate identity (banking, consulting, government) — it signals trustworthiness and cultural resonance without being cliché. Warm off-white prevents the "startup sterility" of pure white backgrounds.

| Role | Hex | Tailwind Approx | Usage |
|---|---|---|---|
| **Brand Navy** | `#1B2D4F` | `slate-900` custom | Logo, nav, headings, primary buttons |
| **Navy mid** | `#2A4A7F` | — | Button hover, section anchors |
| **Amber accent** | `#C97D2E` | — | Icon highlights, CTA buttons, hover underlines |
| **Amber light** | `#F5E6CC` | — | Accent backgrounds, tag chips, blockquote borders |
| **Page bg** | `#F6F5F2` | — | Warm off-white; avoids the "cold dashboard" feel |
| **Surface** | `#FFFFFF` | white | Cards, modals, nav on scroll |
| **Body text** | `#1C2130` | — | Primary copy (not pure black) |
| **Muted text** | `#5B6478` | — | Captions, meta, secondary labels |
| **Dividers** | `#E3E5EA` | — | Borders, separators |
| **Success** | `#2A7A5B` | — | Form success states |
| **Error** | `#C0392B` | — | Form validation |

> **Do not use:** blue gradients, glowing halos, saturated purple, or any multi-stop hero gradients. These read as AI-generated.

---

### Typography

> **Rationale:** Space Grotesk and Satoshi are currently the most overused "AI design" fonts. Plus Jakarta Sans was designed by Indonesian type studio Tokotype — it has genuine Southeast Asian design heritage, reads as polished without being sterile, and is a natural cultural fit for Dharma Sentosa Nusantara. Lora in headlines gives editorial gravitas (used by McKinsey, Slalom) when you need a contrast. Pairing a humanist geometric (Jakarta Sans) with a neutral workhorse (Inter) creates a clear hierarchy without relying on trendy fonts.

| Role | Family | Weight | Notes |
|---|---|---|---|
| **Heading display** | [Plus Jakarta Sans](https://fonts.google.com/specimen/Plus+Jakarta+Sans) | 700, 800 | Hero titles, section headings (H1–H3) |
| **Heading editorial** | [Lora](https://fonts.google.com/specimen/Lora) | 600 italic | Pull quotes, case study subheadings — adds warmth |
| **UI / Body** | [Inter](https://fonts.google.com/specimen/Inter) | 400, 500, 600 | Navigation, body copy, buttons, labels |
| **Mono** | [JetBrains Mono](https://www.jetbrains.com/lp/mono/) | 400 | Code snippets (blog), technical spec details |

**Scale (Tailwind tokens):**
```
text-[11px]  → label / badge
text-sm      → caption, meta
text-base    → body (16px, line-height: 1.75)
text-lg      → lead paragraph
text-2xl     → card heading
text-4xl     → section heading
text-5xl–6xl → hero display (Plus Jakarta Sans 800)
```

**Letter-spacing:** `-0.02em` on display sizes. Never use `tracking-widest` on body — it reads as generic "luxury brand" filler.

---

### Iconography

> **Rationale:** Mixing icon libraries (Heroicons + Font Awesome + emoji) creates visual noise. A single library with consistent weight and metaphor keeps the UI coherent. Phosphor Icons has the most consistent dual-tone treatment without looking "clipart," and it's used by real design teams at companies like Linear and Vercel. Use `regular` weight everywhere, `duotone` only for feature illustrations.

- **Library:** [Phosphor Icons](https://phosphoricons.com) (MIT license, 1400+ icons, 6 weights)
- **Weight:** `regular` for nav and UI; `duotone` for service cards and feature highlights
- **Size:** 20px for inline/nav, 24px for cards, 40–48px for section feature icons
- **Color rule:** icon body in `#1B2D4F` (brand navy), duotone highlight layer in `#C97D2E` (amber accent)
- **Never use:** filled/solid icons next to outline icons in the same section; emoji as icons; random SVG packs

**Icon → Service mapping suggestions:**
| Service | Phosphor Icon |
|---|---|
| Cloud Solutions | `CloudArrowUp` |
| Cybersecurity | `ShieldCheck` |
| IT Consulting | `ChartLineUp` |
| Network Infrastructure | `TreeStructure` |
| Software Development | `CodeBlock` |
| Data & Analytics | `ChartBar` |

---

### Logo Concept

> **Rationale:** Abstract logomarks (orbiting rings, circuit boards, hexagons with gradients) are universally recognized as AI-generated design. Real branding uses either a confident wordmark or a simple geometric mark with a clear metaphor.

**Recommended approach — Wordmark + minimal mark:**

- **Wordmark:** "DHARMA SENTOSA" in Plus Jakarta Sans 700, all-caps, tracked slightly (`letter-spacing: 0.06em`), brand navy `#1B2D4F`. "NUSANTARA" below in lighter weight or smaller size.
- **Monogram mark:** Letterform **"D"** constructed from two offset arcs, forming a subtle open book or shield silhouette. Clean, scalable, works at 16px favicon size.
- **Color variants:** Full-color (navy + amber), white reverse (for dark sections), single-color navy (print).
- **What to avoid:** Gradients inside the mark, bevels, drop shadows, circuit-trace decorations, glowing outlines.

**For actual logo execution:** Brief a designer on 99designs, Dribbble Hiring, or Upwork. Reference marks: [Stripe](https://stripe.com/newsroom/brand), [Linear](https://linear.app/brand), [Plaid](https://plaid.com/brand).

---

### Layout & Composition

> **Rationale:** "Gradient mesh + glow" heroes are the clearest signal of AI-assembled design. Real IT company sites use strong typography, generous white space, and real photography or purposeful illustration — not abstract blobs.

**Grid system:**
- 12-column, `max-w-7xl` (1280px), `px-6 lg:px-8`
- Section vertical rhythm: `py-20 md:py-28` (not `py-32` — too airy for content-dense pages)
- Section-to-section contrast via background alternation: `bg-[#F6F5F2]` → `bg-white` → `bg-[#1B2D4F]` (dark section for stats/CTA)

**Hero section:**
- **No gradient mesh.** Clean `bg-white` or `bg-[#F6F5F2]` hero.
- Left: strong H1 (2–3 lines, Plus Jakarta Sans 800), short lead paragraph, two CTAs (primary button navy + ghost button).
- Right: real dashboard mockup screenshot, client logo strip, or abstract geometric (subtle, single-color line art — not a blob graphic).
- Bottom: horizontal trust strip — "Trusted by X clients · 10+ years · ISO certified" with thin top border.

**Card design:**
- `rounded-xl` (not `rounded-2xl` — slightly less "bubbly"), `border border-[#E3E5EA]`, `bg-white`
- Hover: `border-[#2A4A7F]` transition, `shadow-sm` (not floating dramatic shadows)
- Icon area: small `40×40` amber-tinted square background (`bg-[#F5E6CC]`), duotone icon centered

**Dark section (stats, CTA):**
- `bg-[#1B2D4F]` with `text-white`
- Stat numbers in Plus Jakarta Sans 800, amber underline accent below label
- Avoid: gradient overlays, noise textures, particle animations in dark sections

**Navigation:**
- Transparent on hero, `bg-white/95 backdrop-blur-sm border-b border-[#E3E5EA]` on scroll
- Logo left, nav center or right, CTA button ("Get in Touch") rightmost
- Active link: amber `#C97D2E` bottom underline (2px), not background highlight

---

### Motion

> Keep motion purposeful and invisible. The goal is smoothness, not spectacle.

- **Scroll reveal:** `opacity-0 → opacity-100` + `translateY(16px) → 0` over `400ms ease-out`. One axis only — no complex multi-keyframe entrances.
- **Card hover:** `translateY(-2px)` + border color transition, `150ms ease`. Not `translateY(-8px)` — that's too dramatic.
- **Button:** background color transition `200ms`, no scale transform on primary buttons.
- **Nav underline:** `scaleX(0) → scaleX(1)` on hover, origin-left, `200ms ease`.
- **Library:** Alpine.js `x-intersect` for scroll reveal (already in stack). No GSAP or heavy animation library.
- **Avoid:** parallax on mobile, rotating elements, entrance animations that block content reading.

---

### Asset Recommendations

**Photography (free, commercial license):**
- [Unsplash](https://unsplash.com) — search "IT team", "server room", "business consulting" — avoid the generic stock handshake/laptop photos. Look for candid team shots.
- [Pexels](https://pexels.com) — same guidance.
- Filter for: photos with natural light, Indonesian or Southeast Asian subjects if possible, no AI-generated images.

**Illustrations (if using):**
- [Humaaans](https://www.humaaans.com) — customizable people illustrations, professional tone
- [unDraw](https://undraw.co) — can set to brand navy color, clean line style
- **Avoid:** 3D glossy icons, isometric blobs, any illustration style with gradients inside shapes.

**Icon library:** [Phosphor Icons](https://phosphoricons.com) (as specified above)

**Dashboard mockup (hero visual):**
- Build a real Figma frame of your admin panel or service overview
- Screenshot it in a `rounded-xl` browser frame
- Apply a subtle `3deg` tilt only on desktop; flat on mobile

---

### Responsive

- Mobile-first. Breakpoints: `sm:640`, `md:768`, `lg:1024`, `xl:1280`.
- Hero: stacked single column on mobile (visual below text, smaller).
- Navigation: slide-over drawer (right side), hamburger `≡` icon, full-width nav links, CTA button at bottom of drawer.
- Bottom sticky bar on mobile: "Call Us · WhatsApp · Get Quote" with icon strip. `bg-white border-t` — not a colored floating button.
- Cards: 1 col mobile → 2 col tablet → 3 col desktop.

---

### What to Explicitly Avoid

| Pattern | Why it looks AI-generated | What to do instead |
|---|---|---|
| Blue-to-indigo gradient hero | Default Tailwind AI output | Solid warm off-white with strong type |
| Glow halos behind icons | No real company uses this | Flat amber square background |
| `rounded-3xl` everything | Too bubbly, infantilizes brand | `rounded-xl` for cards, `rounded-lg` for buttons |
| Multi-gradient CTA buttons | Screams template | Solid navy button, amber on hover |
| Particle.js / animated blobs | 2019 startup cliché | Static geometric line art |
| Icon soup (different styles) | Incoherent visual language | Phosphor `regular` only |
| Generic "hero illustration" SVG | Unprofessional for IT consultancy | Real mockup screenshot or team photo |

---

## 7. Step-by-Step Implementation

| Phase | Task |
|---|---|
| **1. Setup** | `laravel new`, install Vite + Tailwind + Alpine. Install Filament v3, spatie/laravel-permission, spatie/laravel-medialibrary, spatie/laravel-sitemap. |
| **2. Database** | Design + write migrations for all content tables. Create seeders (admin user, sample services, sample posts). |
| **3. Models** | Eloquent models with relationships, slugs (`sluggable`), media conversions, scopes (published, featured, ordered). |
| **4. Filament panel** | Generate resources for each model. Configure forms (rich editor for posts, image uploads, repeaters for gallery). Configure tables (search, filters, bulk actions). Build Settings page. |
| **5. Auth & roles** | Install permission package, define roles/policies, seed super-admin, protect Filament with role middleware. |
| **6. Public layout & design system** | Base Blade layout, SEO partial, header/footer, Tailwind theme tokens, UI primitives (`<x-button>`, `<x-container>`, `<x-section-heading>`). |
| **7. Home page** | Controller pulls featured services, case studies, testimonials, partners. Build all sections as reusable components. |
| **8. Inner pages** | About, Services index + detail, Portfolio index + detail, Blog index + detail, Contact. Pagination on list pages. |
| **9. Contact flow** | `FormRequest` validation, honeypot + Cloudflare Turnstile, queued `ContactInquiry` mail, save to `contact_messages` table, success toast. |
| **10. SEO** | Dynamic meta per page, OG tags, JSON-LD (Organization, Article, Service, BreadcrumbList), `spatie/laravel-sitemap` auto-generated, `robots.txt`, canonicals. |
| **11. Performance** | Image conversions (WebP), lazy-load, Tailwind purge, route/view/config cache, `spatie/laravel-responsecache` for anonymous traffic. |
| **12. Security polish** | CSP/HSTS middleware, rate-limits, `APP_DEBUG=false`, 2FA for admins (optional), backup command (`spatie/laravel-backup`). |
| **13. QA** | Lighthouse 95+, WCAG AA pass, Pest tests for contact form + auth + critical routes, cross-browser check. |
| **14. Deploy** | Laravel Forge/Vapor, MySQL, Redis (cache/queue), Cloudflare CDN, HTTPS, automated DB backups to S3. |

---

## 8. Best Practices

### Performance

- Vite production build + asset versioning; Tailwind purge <15KB CSS.
- Image conversions via Media Library (thumb, card, hero, WebP).
- `loading="lazy"` + `fetchpriority="high"` on hero.
- Route/view/config/event cache; OPcache enabled.
- Response cache for anonymous traffic (5–15 min).
- Redis for cache + queue; queue contact emails and heavy jobs.

### SEO

- Server-rendered Blade — crawlable by default.
- Structured data (Organization, LocalBusiness, Article, Service, BreadcrumbList).
- Auto-generated sitemap.xml (rebuilt on model save).
- Editable SEO meta per content (title, description, OG image) from Filament.
- Semantic HTML + proper heading hierarchy.
- Optional i18n (ID/EN) via `Route::prefix('{locale}')` + `spatie/laravel-translatable`.

### Security

- Filament login rate-limited; lockout after failed attempts.
- CSRF everywhere; form requests for validation.
- Role-based policies on all admin actions.
- Cloudflare Turnstile + honeypot on contact form.
- CSP, X-Frame-Options, Referrer-Policy, HSTS via middleware.
- `APP_DEBUG=false` in production.
- Signed URLs for any temporary file access.
- Daily encrypted DB backups to S3.
- `composer audit` + Dependabot in CI.

---

## 9. Future Scalability

### Short-term

- **Multilingual (ID/EN)** — `spatie/laravel-translatable` on content models; Filament language switcher.
- **Careers module** — `jobs` + `applications` tables + public listing.
- **Search** — Laravel Scout + Meilisearch for blog/case studies.
- **Newsletter** — Mailcoach integration or Mailchimp API.

### Medium-term

- **Role expansion** — add `author`, `viewer` roles; activity log (`spatie/laravel-activitylog`).
- **Media CDN** — move uploads to S3 + CloudFront.
- **API layer** — expose read-only JSON API for mobile app or external sites.
- **Client portal** — authenticated area for existing clients (tickets, documents).

### Long-term

- **Headless option** — keep Filament as CMS, swap Blade for Next.js/Nuxt frontend via API.
- **Multi-site** — serve multiple brands from one CMS (tenant per domain).
- **Analytics dashboard** — custom Filament widgets pulling from Plausible API.

---

## 10. Deliverable Targets

- Lighthouse **95+ / 95+ / 100 / 100**
- Initial JS payload **< 100KB**
- Sub-1s LCP on 4G
- Admin panel fully functional (all content editable without touching code)
- Seeded with demo content so site is publishable immediately after deploy
- Automated daily backups + staging environment for previews
