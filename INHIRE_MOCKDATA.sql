PGDMP                      }            inhire    17.4    17.4     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            �           1262    36737    inhire    DATABASE     l   CREATE DATABASE inhire WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en-US';
    DROP DATABASE inhire;
                     postgres    false            �            1259    36738 	   contracts    TABLE     �  CREATE TABLE public.contracts (
    id bigint NOT NULL,
    job_id bigint NOT NULL,
    user_id bigint NOT NULL,
    pay_amount numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    is_completed boolean NOT NULL,
    client_rating smallint,
    client_feedback character varying(255),
    talent_rating smallint,
    talent_feedback character varying(255)
);
    DROP TABLE public.contracts;
       public         heap r       postgres    false            �            1259    36744    contracts_id_seq    SEQUENCE     y   CREATE SEQUENCE public.contracts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.contracts_id_seq;
       public               postgres    false    217            �           0    0    contracts_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.contracts_id_seq OWNED BY public.contracts.id;
          public               postgres    false    218            �            1259    36745 	   durations    TABLE     d   CREATE TABLE public.durations (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.durations;
       public         heap r       postgres    false            �            1259    36748    durations_id_seq    SEQUENCE     y   CREATE SEQUENCE public.durations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.durations_id_seq;
       public               postgres    false    219            �           0    0    durations_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.durations_id_seq OWNED BY public.durations.id;
          public               postgres    false    220            �            1259    36749    english_levels    TABLE     �   CREATE TABLE public.english_levels (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL
);
 "   DROP TABLE public.english_levels;
       public         heap r       postgres    false            �            1259    36754    english_levels_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.english_levels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.english_levels_id_seq;
       public               postgres    false    221            �           0    0    english_levels_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.english_levels_id_seq OWNED BY public.english_levels.id;
          public               postgres    false    222            �            1259    36755    experience_levels    TABLE     �   CREATE TABLE public.experience_levels (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL
);
 %   DROP TABLE public.experience_levels;
       public         heap r       postgres    false            �            1259    36760    experience_levels_id_seq    SEQUENCE     �   CREATE SEQUENCE public.experience_levels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.experience_levels_id_seq;
       public               postgres    false    223            �           0    0    experience_levels_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.experience_levels_id_seq OWNED BY public.experience_levels.id;
          public               postgres    false    224            �            1259    36761    fixed_price_jobs    TABLE     b   CREATE TABLE public.fixed_price_jobs (
    id bigint NOT NULL,
    price numeric(8,2) NOT NULL
);
 $   DROP TABLE public.fixed_price_jobs;
       public         heap r       postgres    false            �            1259    36764    hourly_jobs    TABLE     �   CREATE TABLE public.hourly_jobs (
    id bigint NOT NULL,
    rate_min numeric(8,2) NOT NULL,
    rate_max numeric(8,2) NOT NULL,
    weekly_hours_limit integer NOT NULL,
    duration_id bigint NOT NULL
);
    DROP TABLE public.hourly_jobs;
       public         heap r       postgres    false            �            1259    36767 
   job_skills    TABLE     u   CREATE TABLE public.job_skills (
    id bigint NOT NULL,
    job_id bigint NOT NULL,
    skill_id bigint NOT NULL
);
    DROP TABLE public.job_skills;
       public         heap r       postgres    false            �            1259    36770    job_skills_id_seq    SEQUENCE     z   CREATE SEQUENCE public.job_skills_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.job_skills_id_seq;
       public               postgres    false    227            �           0    0    job_skills_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.job_skills_id_seq OWNED BY public.job_skills.id;
          public               postgres    false    228            �            1259    36771    jobs    TABLE     �  CREATE TABLE public.jobs (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    description text NOT NULL,
    role_id bigint NOT NULL,
    experience_level_id bigint NOT NULL,
    type character varying(255) NOT NULL,
    scope character varying(255) NOT NULL,
    english_level_id bigint,
    number_of_hires integer DEFAULT 1 NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    last_viewed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    CONSTRAINT jobs_scope_check CHECK (((scope)::text = ANY (ARRAY[('one-time'::character varying)::text, ('ongoing'::character varying)::text, ('complex'::character varying)::text]))),
    CONSTRAINT jobs_type_check CHECK (((type)::text = ANY (ARRAY[('hourly'::character varying)::text, ('fixed-price'::character varying)::text])))
);
    DROP TABLE public.jobs;
       public         heap r       postgres    false            �            1259    36782    jobs_id_seq    SEQUENCE     t   CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.jobs_id_seq;
       public               postgres    false    229            �           0    0    jobs_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;
          public               postgres    false    230            �            1259    36783 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap r       postgres    false            �            1259    36786    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public               postgres    false    231            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public               postgres    false    232            �            1259    36787 	   proposals    TABLE     y  CREATE TABLE public.proposals (
    id bigint NOT NULL,
    job_id bigint NOT NULL,
    user_id bigint NOT NULL,
    bid_amount numeric(8,2) NOT NULL,
    duration_id bigint,
    letter text NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    status character varying(255) NOT NULL,
    interview_date date,
    interview_time time without time zone,
    CONSTRAINT proposals_status_check CHECK (((status)::text = ANY (ARRAY[('pending'::character varying)::text, ('interviewed'::character varying)::text, ('accepted'::character varying)::text, ('rejected'::character varying)::text])))
);
    DROP TABLE public.proposals;
       public         heap r       postgres    false            �            1259    36794    proposals_id_seq    SEQUENCE     y   CREATE SEQUENCE public.proposals_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.proposals_id_seq;
       public               postgres    false    233            �           0    0    proposals_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.proposals_id_seq OWNED BY public.proposals.id;
          public               postgres    false    234            �            1259    36795    role_categories    TABLE     j   CREATE TABLE public.role_categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
 #   DROP TABLE public.role_categories;
       public         heap r       postgres    false            �            1259    36798    role_categories_id_seq    SEQUENCE        CREATE SEQUENCE public.role_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.role_categories_id_seq;
       public               postgres    false    235            �           0    0    role_categories_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.role_categories_id_seq OWNED BY public.role_categories.id;
          public               postgres    false    236            �            1259    36799    roles    TABLE     �   CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    role_category_id bigint NOT NULL
);
    DROP TABLE public.roles;
       public         heap r       postgres    false            �            1259    36802    roles_id_seq    SEQUENCE     u   CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public               postgres    false    237            �           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public               postgres    false    238            �            1259    36803    sessions    TABLE     �   CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);
    DROP TABLE public.sessions;
       public         heap r       postgres    false            �            1259    36808    skills    TABLE     a   CREATE TABLE public.skills (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.skills;
       public         heap r       postgres    false            �            1259    36811    skills_id_seq    SEQUENCE     v   CREATE SEQUENCE public.skills_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.skills_id_seq;
       public               postgres    false    240            �           0    0    skills_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.skills_id_seq OWNED BY public.skills.id;
          public               postgres    false    241            �            1259    36812    user_skills    TABLE     w   CREATE TABLE public.user_skills (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    skill_id bigint NOT NULL
);
    DROP TABLE public.user_skills;
       public         heap r       postgres    false            �            1259    36815    user_skills_id_seq    SEQUENCE     {   CREATE SEQUENCE public.user_skills_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.user_skills_id_seq;
       public               postgres    false    242            �           0    0    user_skills_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.user_skills_id_seq OWNED BY public.user_skills.id;
          public               postgres    false    243            �            1259    36816    users    TABLE     -  CREATE TABLE public.users (
    id bigint NOT NULL,
    first_name character varying(255) NOT NULL,
    middle_name character varying(255),
    last_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    contact_number character varying NOT NULL,
    password character varying(255) NOT NULL,
    desc_title character varying(255),
    desc_text text,
    experience_level_id bigint,
    english_level_id bigint,
    hourly_rate numeric(8,2),
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.users;
       public         heap r       postgres    false            �            1259    36822    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public               postgres    false    244            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public               postgres    false    245            �           2604    36823    contracts id    DEFAULT     l   ALTER TABLE ONLY public.contracts ALTER COLUMN id SET DEFAULT nextval('public.contracts_id_seq'::regclass);
 ;   ALTER TABLE public.contracts ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    218    217            �           2604    36824    durations id    DEFAULT     l   ALTER TABLE ONLY public.durations ALTER COLUMN id SET DEFAULT nextval('public.durations_id_seq'::regclass);
 ;   ALTER TABLE public.durations ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    220    219            �           2604    36825    english_levels id    DEFAULT     v   ALTER TABLE ONLY public.english_levels ALTER COLUMN id SET DEFAULT nextval('public.english_levels_id_seq'::regclass);
 @   ALTER TABLE public.english_levels ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    222    221            �           2604    36826    experience_levels id    DEFAULT     |   ALTER TABLE ONLY public.experience_levels ALTER COLUMN id SET DEFAULT nextval('public.experience_levels_id_seq'::regclass);
 C   ALTER TABLE public.experience_levels ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    224    223            �           2604    36827    job_skills id    DEFAULT     n   ALTER TABLE ONLY public.job_skills ALTER COLUMN id SET DEFAULT nextval('public.job_skills_id_seq'::regclass);
 <   ALTER TABLE public.job_skills ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    228    227            �           2604    36828    jobs id    DEFAULT     b   ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);
 6   ALTER TABLE public.jobs ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    230    229            �           2604    36829    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    232    231            �           2604    36830    proposals id    DEFAULT     l   ALTER TABLE ONLY public.proposals ALTER COLUMN id SET DEFAULT nextval('public.proposals_id_seq'::regclass);
 ;   ALTER TABLE public.proposals ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    234    233            �           2604    36831    role_categories id    DEFAULT     x   ALTER TABLE ONLY public.role_categories ALTER COLUMN id SET DEFAULT nextval('public.role_categories_id_seq'::regclass);
 A   ALTER TABLE public.role_categories ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    236    235            �           2604    36832    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    238    237            �           2604    36833 	   skills id    DEFAULT     f   ALTER TABLE ONLY public.skills ALTER COLUMN id SET DEFAULT nextval('public.skills_id_seq'::regclass);
 8   ALTER TABLE public.skills ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    241    240            �           2604    36834    user_skills id    DEFAULT     p   ALTER TABLE ONLY public.user_skills ALTER COLUMN id SET DEFAULT nextval('public.user_skills_id_seq'::regclass);
 =   ALTER TABLE public.user_skills ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    243    242            �           2604    36835    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    245    244            �          0    36738 	   contracts 
   TABLE DATA           �   COPY public.contracts (id, job_id, user_id, pay_amount, created_at, is_completed, client_rating, client_feedback, talent_rating, talent_feedback) FROM stdin;
    public               postgres    false    217   f�       �          0    36745 	   durations 
   TABLE DATA           -   COPY public.durations (id, name) FROM stdin;
    public               postgres    false    219   ��       �          0    36749    english_levels 
   TABLE DATA           ?   COPY public.english_levels (id, name, description) FROM stdin;
    public               postgres    false    221   ��       �          0    36755    experience_levels 
   TABLE DATA           B   COPY public.experience_levels (id, name, description) FROM stdin;
    public               postgres    false    223   �       �          0    36761    fixed_price_jobs 
   TABLE DATA           5   COPY public.fixed_price_jobs (id, price) FROM stdin;
    public               postgres    false    225   }�       �          0    36764    hourly_jobs 
   TABLE DATA           ^   COPY public.hourly_jobs (id, rate_min, rate_max, weekly_hours_limit, duration_id) FROM stdin;
    public               postgres    false    226   ��       �          0    36767 
   job_skills 
   TABLE DATA           :   COPY public.job_skills (id, job_id, skill_id) FROM stdin;
    public               postgres    false    227   �       �          0    36771    jobs 
   TABLE DATA           �   COPY public.jobs (id, title, description, role_id, experience_level_id, type, scope, english_level_id, number_of_hires, user_id, created_at, last_viewed_at, is_active) FROM stdin;
    public               postgres    false    229   �       �          0    36783 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public               postgres    false    231   ��       �          0    36787 	   proposals 
   TABLE DATA           �   COPY public.proposals (id, job_id, user_id, bid_amount, duration_id, letter, created_at, status, interview_date, interview_time) FROM stdin;
    public               postgres    false    233   ê       �          0    36795    role_categories 
   TABLE DATA           3   COPY public.role_categories (id, name) FROM stdin;
    public               postgres    false    235   M�       �          0    36799    roles 
   TABLE DATA           ;   COPY public.roles (id, name, role_category_id) FROM stdin;
    public               postgres    false    237   �       �          0    36803    sessions 
   TABLE DATA           _   COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
    public               postgres    false    239   6�       �          0    36808    skills 
   TABLE DATA           *   COPY public.skills (id, name) FROM stdin;
    public               postgres    false    240   S�       �          0    36812    user_skills 
   TABLE DATA           <   COPY public.user_skills (id, user_id, skill_id) FROM stdin;
    public               postgres    false    242   ^�       �          0    36816    users 
   TABLE DATA           �   COPY public.users (id, first_name, middle_name, last_name, email, contact_number, password, desc_title, desc_text, experience_level_id, english_level_id, hourly_rate, created_at) FROM stdin;
    public               postgres    false    244   ��       �           0    0    contracts_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.contracts_id_seq', 8, true);
          public               postgres    false    218            �           0    0    durations_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.durations_id_seq', 4, true);
          public               postgres    false    220            �           0    0    english_levels_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.english_levels_id_seq', 4, true);
          public               postgres    false    222            �           0    0    experience_levels_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.experience_levels_id_seq', 3, true);
          public               postgres    false    224            �           0    0    job_skills_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.job_skills_id_seq', 1, false);
          public               postgres    false    228            �           0    0    jobs_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.jobs_id_seq', 13, true);
          public               postgres    false    230            �           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 16, true);
          public               postgres    false    232            �           0    0    proposals_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.proposals_id_seq', 14, true);
          public               postgres    false    234            �           0    0    role_categories_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.role_categories_id_seq', 8, true);
          public               postgres    false    236            �           0    0    roles_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.roles_id_seq', 40, true);
          public               postgres    false    238            �           0    0    skills_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.skills_id_seq', 50, true);
          public               postgres    false    241            �           0    0    user_skills_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.user_skills_id_seq', 14, true);
          public               postgres    false    243            �           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 11, true);
          public               postgres    false    245            �           2606    36837    contracts contracts_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.contracts DROP CONSTRAINT contracts_pkey;
       public                 postgres    false    217            �           2606    36839    durations durations_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.durations
    ADD CONSTRAINT durations_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.durations DROP CONSTRAINT durations_pkey;
       public                 postgres    false    219            �           2606    36841 "   english_levels english_levels_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.english_levels
    ADD CONSTRAINT english_levels_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.english_levels DROP CONSTRAINT english_levels_pkey;
       public                 postgres    false    221            �           2606    36843 (   experience_levels experience_levels_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.experience_levels
    ADD CONSTRAINT experience_levels_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.experience_levels DROP CONSTRAINT experience_levels_pkey;
       public                 postgres    false    223            �           2606    36845 &   fixed_price_jobs fixed_price_jobs_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.fixed_price_jobs
    ADD CONSTRAINT fixed_price_jobs_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.fixed_price_jobs DROP CONSTRAINT fixed_price_jobs_pkey;
       public                 postgres    false    225            �           2606    36847    hourly_jobs hourly_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.hourly_jobs
    ADD CONSTRAINT hourly_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.hourly_jobs DROP CONSTRAINT hourly_jobs_pkey;
       public                 postgres    false    226            �           2606    36849    job_skills job_skills_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.job_skills
    ADD CONSTRAINT job_skills_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.job_skills DROP CONSTRAINT job_skills_pkey;
       public                 postgres    false    227            �           2606    36851    jobs jobs_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_pkey;
       public                 postgres    false    229            �           2606    36853    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public                 postgres    false    231            �           2606    36855    proposals proposals_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.proposals
    ADD CONSTRAINT proposals_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.proposals DROP CONSTRAINT proposals_pkey;
       public                 postgres    false    233            �           2606    36857 $   role_categories role_categories_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.role_categories
    ADD CONSTRAINT role_categories_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.role_categories DROP CONSTRAINT role_categories_pkey;
       public                 postgres    false    235            �           2606    36859    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public                 postgres    false    237            �           2606    36861    sessions sessions_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.sessions DROP CONSTRAINT sessions_pkey;
       public                 postgres    false    239                       2606    36863    skills skills_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.skills
    ADD CONSTRAINT skills_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.skills DROP CONSTRAINT skills_pkey;
       public                 postgres    false    240                       2606    36865    user_skills user_skills_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.user_skills
    ADD CONSTRAINT user_skills_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.user_skills DROP CONSTRAINT user_skills_pkey;
       public                 postgres    false    242                       2606    36867 !   users users_contact_number_unique 
   CONSTRAINT     f   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_contact_number_unique UNIQUE (contact_number);
 K   ALTER TABLE ONLY public.users DROP CONSTRAINT users_contact_number_unique;
       public                 postgres    false    244                       2606    36869    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public                 postgres    false    244            
           2606    36871    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public                 postgres    false    244            �           1259    36872    sessions_last_activity_index    INDEX     Z   CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);
 0   DROP INDEX public.sessions_last_activity_index;
       public                 postgres    false    239                        1259    36873    sessions_user_id_index    INDEX     N   CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);
 *   DROP INDEX public.sessions_user_id_index;
       public                 postgres    false    239                       2606    36874 "   contracts contracts_job_id_foreign    FK CONSTRAINT        ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_job_id_foreign FOREIGN KEY (job_id) REFERENCES public.jobs(id);
 L   ALTER TABLE ONLY public.contracts DROP CONSTRAINT contracts_job_id_foreign;
       public               postgres    false    4852    217    229                       2606    36879 #   contracts contracts_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.contracts
    ADD CONSTRAINT contracts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 M   ALTER TABLE ONLY public.contracts DROP CONSTRAINT contracts_user_id_foreign;
       public               postgres    false    244    4874    217                       2606    36884 ,   fixed_price_jobs fixed_price_jobs_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.fixed_price_jobs
    ADD CONSTRAINT fixed_price_jobs_id_foreign FOREIGN KEY (id) REFERENCES public.jobs(id);
 V   ALTER TABLE ONLY public.fixed_price_jobs DROP CONSTRAINT fixed_price_jobs_id_foreign;
       public               postgres    false    229    225    4852                       2606    36889 +   hourly_jobs hourly_jobs_duration_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.hourly_jobs
    ADD CONSTRAINT hourly_jobs_duration_id_foreign FOREIGN KEY (duration_id) REFERENCES public.durations(id);
 U   ALTER TABLE ONLY public.hourly_jobs DROP CONSTRAINT hourly_jobs_duration_id_foreign;
       public               postgres    false    219    226    4840                       2606    36894 "   hourly_jobs hourly_jobs_id_foreign    FK CONSTRAINT     {   ALTER TABLE ONLY public.hourly_jobs
    ADD CONSTRAINT hourly_jobs_id_foreign FOREIGN KEY (id) REFERENCES public.jobs(id);
 L   ALTER TABLE ONLY public.hourly_jobs DROP CONSTRAINT hourly_jobs_id_foreign;
       public               postgres    false    229    4852    226                       2606    36899 $   job_skills job_skills_job_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.job_skills
    ADD CONSTRAINT job_skills_job_id_foreign FOREIGN KEY (job_id) REFERENCES public.jobs(id);
 N   ALTER TABLE ONLY public.job_skills DROP CONSTRAINT job_skills_job_id_foreign;
       public               postgres    false    4852    227    229                       2606    36904 &   job_skills job_skills_skill_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.job_skills
    ADD CONSTRAINT job_skills_skill_id_foreign FOREIGN KEY (skill_id) REFERENCES public.skills(id);
 P   ALTER TABLE ONLY public.job_skills DROP CONSTRAINT job_skills_skill_id_foreign;
       public               postgres    false    4866    240    227                       2606    36909 "   jobs jobs_english_level_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_english_level_id_foreign FOREIGN KEY (english_level_id) REFERENCES public.english_levels(id);
 L   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_english_level_id_foreign;
       public               postgres    false    4842    229    221                       2606    36914 %   jobs jobs_experience_level_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_experience_level_id_foreign FOREIGN KEY (experience_level_id) REFERENCES public.experience_levels(id);
 O   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_experience_level_id_foreign;
       public               postgres    false    4844    229    223                       2606    36919    jobs jobs_role_id_foreign    FK CONSTRAINT     x   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id);
 C   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_role_id_foreign;
       public               postgres    false    4860    229    237                       2606    36924    jobs jobs_user_id_foreign    FK CONSTRAINT     x   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 C   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_user_id_foreign;
       public               postgres    false    244    229    4874                       2606    36929 '   proposals proposals_duration_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.proposals
    ADD CONSTRAINT proposals_duration_id_foreign FOREIGN KEY (duration_id) REFERENCES public.durations(id);
 Q   ALTER TABLE ONLY public.proposals DROP CONSTRAINT proposals_duration_id_foreign;
       public               postgres    false    4840    233    219                       2606    36934 "   proposals proposals_job_id_foreign    FK CONSTRAINT        ALTER TABLE ONLY public.proposals
    ADD CONSTRAINT proposals_job_id_foreign FOREIGN KEY (job_id) REFERENCES public.jobs(id);
 L   ALTER TABLE ONLY public.proposals DROP CONSTRAINT proposals_job_id_foreign;
       public               postgres    false    4852    233    229                       2606    36939 #   proposals proposals_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.proposals
    ADD CONSTRAINT proposals_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 M   ALTER TABLE ONLY public.proposals DROP CONSTRAINT proposals_user_id_foreign;
       public               postgres    false    244    233    4874                       2606    36944 $   roles roles_role_category_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_role_category_id_foreign FOREIGN KEY (role_category_id) REFERENCES public.role_categories(id);
 N   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_role_category_id_foreign;
       public               postgres    false    237    4858    235                       2606    36949 (   user_skills user_skills_skill_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.user_skills
    ADD CONSTRAINT user_skills_skill_id_foreign FOREIGN KEY (skill_id) REFERENCES public.skills(id);
 R   ALTER TABLE ONLY public.user_skills DROP CONSTRAINT user_skills_skill_id_foreign;
       public               postgres    false    4866    242    240                       2606    36954 '   user_skills user_skills_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.user_skills
    ADD CONSTRAINT user_skills_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);
 Q   ALTER TABLE ONLY public.user_skills DROP CONSTRAINT user_skills_user_id_foreign;
       public               postgres    false    244    242    4874                       2606    36959 $   users users_english_level_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_english_level_id_foreign FOREIGN KEY (english_level_id) REFERENCES public.english_levels(id);
 N   ALTER TABLE ONLY public.users DROP CONSTRAINT users_english_level_id_foreign;
       public               postgres    false    4842    221    244                       2606    36964 '   users users_experience_level_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_experience_level_id_foreign FOREIGN KEY (experience_level_id) REFERENCES public.experience_levels(id);
 Q   ALTER TABLE ONLY public.users DROP CONSTRAINT users_experience_level_id_foreign;
       public               postgres    false    244    223    4844            �   7  x�mPAr�0<;��J�	$@nz��\��4n��)}}`z)3ےV��Vb+vb#s)E)�j%�UY�\7UѬ�������b/�B��x��Z$Q�72�B!Br~u���t�م�'l�uUO�d���WHz��[�0�)h�"�m�7�Q{B5��=z��E*2���l�X����M#��(o�^[�)�y�j0�����8h$����٨c�A��X@��3#&���a�v�d�g�M�eҍ8�q��V�(�Z��M�̒������u�Ab�;����E�\cK�n
���C�M�Ihf�F�������gY���      �   :   x�3��I-.V(�H�S0T���+��2�4�5�����9Mt�`N���T�j�`� ��      �   �   x���MN�@�יS� �	�'`�̸��cG󓨷�I7�+v���g��<\�r> 3��p�f-���B����N'����4�V�5�?0����]:is�Wڷ�P;�����~�*W�����p>���V���;+��<��Qzr��0�gV�8v�rs ��z�]MĦ�gj��ex3]��#�q�Gm{��D��h�s~D�
��k����(QC�zO������B��[��      �      x�]�Q
�0����sA=C
����B�-�Z��A|~>�:��9��	�Y\��`|�g��weN�zs��I���(+Q��b����¢��P���н��0O�Xh�}A,!�ˇ��}=�wɟ<`      �      x�3�41�30��4ӆ���`F� I��      �   F   x�3�46�30�41 ����\���`L�ӈ�]Ș��������n�42���ZM`ꌹb���� o
a      �      x������ � �      �   
  x�}X�r�|�� �$��:z��r���u�������p`b������K�����`��hz�*Kbp9�Ow����O�;_��ƸКN�޸�|���/m����F�J�Qu�S�f�k�)���O��]������\i��؛��RP�q�Z��a`Ә.Z��G�o}2]�e��w�p��g�����?Ω�i�NF5�X�m�kAu&���\Eh�'_;W�M���2��+�\Х����^���mm�����J��c[Jf��7yc�H+����xe+���(��%�"��v�@�J�Vu�1�Э��b׶&Y��3:�;o�Jy�U�.;�Y���v6�cT����47��"��wQ�n�~1��adJ��o����T��~�1���6���W]�b���d�动P�n��RŢ6e���/�Nug�*���s��kl�����Biˈ5!�����X��Ѩ�/#���`N�'��߸�9�29�_��W����zzq=��TW7�7W������'����-P�(as	�&�,��w�mH�����.��0�1��!��NWIF��&Ն�g�����-�&i���.��Z֩�.��Qݾ_�2rR�cb�+ �FR �����e�r�������K�'�V�`�M�8�'Eei��C�b���e�:���0��Q�K��e$�|q���X-�CH)�Z��}ޥ�E�Zk��xr�<Ma�_����Z��P�c�_Cj��8@JU�<ڥu6���'��.YT��N5��Q0�l�C��&Wד��2�f{us���t�r���N�G�5XO��-��1���߀b��+���"��B�#Bfg��N� @@����؁�Y�6�?W�Y�W2�ނ2�X� ��S�֮���:���r�B�����!f�E�@�%f��<^i��cC��c:T@�&19��������oz&d��rb��Nm�Y�[���,K�B� 7�uݴ��!�~0qhrM(�i���M��r`j������J�En���D��#��L�Ε�f�Z$��NN��i�\M*�h�iہ ���¿c\]^�\�p�Y:{���5N���O�u�[��d�< 5[�Ԡ�u4�a�ف�JjO[G*�B`=��9���_>,��%�@U9�l�;��~$8Jޤ��(�Rf�\�8�1�WL,֕}F�H_����Śa�
�:��o D�'Gy���1:��-��$}J9G���D��Hq��3���6��E~O��j�I>�P4�1{х���Go���D�q%E7~��z�D�T��B2��)+d���m��g6`f�fP��9xDv�����ϋ����&��ll��*�p
ա(����Pf){=�F#ʣ�2� 	���$"�PZ��a��f�d�!d����f/s�TH:��7z!�~���O��b�!�\�|`�F �E�SG$�D; C,�>�F��X ��|������Z��f���-C����&ĜXQ�W�gd�V�~�Aw����HSZ�ri�����mv_ƹ�_���E� Ř�-�FUi�^�h'�r���Sԇa�-x�Ʀ�,rV3Ӂf]���,��a�|J;Rq��Cv�{������g���r�#��-�(r��^�]L'��PsY[����`yU�CWЂ(�3$�H@��$�����h1h��t�%0�W������X9��[G� Ͻv��[�;0k#9e�$�M�(%,z�4'�Bdtf��3Ɲy��A��D[�6�����. �<s���A�L��B�,�}&�b��	k�9��#羹G(����a��ⓙ�,�,�3�+����:��Hq�<�=Ñ>Ă���`K���@�$�.���G��1��g��|��E/u���=���ڷ	k� ����j�Lm��]�؈P%y����O]��]J��#�}{ D�R Q�"<k���$������gZ��{����Od��͘ 0�*nu��*�b�X��z�I�t�Hhb�}$����={W�Y�}d��+9�kE�"dCGљ��O+|��� ��k�a�3��e�e�ѱ����,�3��0~��/ND�t�/O{�O�w�:%k�f�T`)d�a�
><�j8]�=�׃���چ����{����,Z��X��^B`p*�sgԓ��;�[�b-�0��^�r�E��n�g�0!�\�>�d[�j��M�nG���5�zR֏o^=�V����������x�P�0dVv��{9�����G7
)ݫc|�e�X� ����@n�X@`��<znj��� ������������!\�ؕ}&5JPڀdIǈ�a0O(��3����
���A)�p0!�iD�\��M�v���'�A,��-��7�c�������@���|c҆�;���� _�|����=�f�V�mUϳY�w1���pzm��UF�%�	��6��ǹ�������,w�=�[�Q�\h4o�`J��ˊ
�����d�Vhc��bw��W+>u(0;5�ffd��(����������V��F�s��M�{�%�?yK(�j�E��������B7��Ѯ�O�9dQ@sk%�%� ������=��%@ͩn�.��K�����ط�N7pyɳ��������=���      �     x�e�Mn� �u|���'��Ri��iB��;Jo_g��S	Y,��G��"�4(4��F��&�V���ϸN7O�$�W#�L���v��Q�(�ah#j9H���G�%���f �C���ݻ���+K�J�ļ�iu1Tܟ��%�eJj�B�Ǒ��=~�[u �P�/�����G8��r/�qI��H������Q�/).1O��\�c�6�5Mvmt�s?
A#��3�|*��� ���-s[%����;�.�Pv�]��@g�      �   z  x��XK��6]˧�؆l����bf �ޔ��Ę"5$e���Cd���I�jAgoذ$�U�^=>P�l�ͮ���C���jW�t	&�Q�$�� 1�p%��:�R/��ч49��ĉ�~
�C�����xG�Z�G	@\�h8K���c�z�g6~L0i�ۈ��Y�o&���5-���9��!M���5�`:� �W�X����7��<k�&��m2�ɢ����h�\@@o԰Ӈ)�Ô�6�'ks�8	?���l�~탟��OI!sí���="/Jg��J0
0j���B��]L����_�`��ʰ���$���X�(�L:�dB�4�Z>x�1G�v���緉���7:�5�A<�]@5]2��
�ÅC�J�q'M�$#������˕ܜ���@|v�9&�Rg�~�>.���:Kq�jYb<"�\*�ȸ`{��:�(��"�B�)��d,h:��w��Z��Xq`k׀���E�T�ܤ�t!��P1�N����������w21N����%������<�M�D�ZQ�>�m�8��p%kb7�⣨�0��Y��I���Vƙ �D<gv #ǃ�Y���L�.+؂	��Lt�!g1��Q���*��WT�T0��4K����_�a��()�­A��k��}��ϛ&#Ɩ 6���<��}�
�˅��m�ݯ��j�H��u��
�
Qm����i��۫;m�;w*�T��>��}r����l��lNxTܩ�Sq��N��;mԝ�id��o��Z����ş�?*�t���V��>�Ӌ��mʻ]q��Nŝ�yzz|�>������px*��w*�T��g�ݿ����j��Z��,6��걼��*fU��~f��ï>�M��^,���      �   �   x�%���0Dk�W�J��MqHHP%�eVf�����|?&�3�fiN8aL〬�����I����GA�4!�ͅر��ާ�J`c��@3Y���ve�(l͙1�T�g����";s��"�M�"�Zߝ|p�<�����^�X/$�� ��7�      �   5  x�mS�n�0}��B_0ė��[ѡ��X_��ʜ-D�I�����9$}xH�P��YU���Ď>Hێ��4�`��<����0�öq�%���xe�t;(���IS�Ҡ�����nQ�F#����|���xU�1�%Kx�U@'�*}��+8Y�8�H�������v��38�o�1e@Sg8�Z�V�Γ4�o��獵g/���^4!R9<\/�����V�W��Ty��T�9lzv�|,���.`��LŽ�`M-� NEA��+�t	e�*�/�A}�(���y��lH�+����}�1���&1�^H6FI���w�uw�JW��X��l��m��y�e�75�D.�|��W��r9&��(�D�d�v��;��*��p�Y4sؖ�X�g��G3er/+j��F�"ɖ�D5��N���;��:)��z�"�g7��j9���t��9X&yvϸ3���a�j^l=Ax���4�LP���U�H���=ˊ�C\�ѯp�ܴ�4N�d���>[(������Uw҈`�#�Qh;i��`�!�q�3oD_���4��������}���K�$ *o�      �      x������ � �      �   �  x�eT�V�0]K_�UW�ď Y�(��&�n��਱%=B�����@ڥgFs�-�ykd#>�����N�S+�F����Vi��࢑�P�`sid-�����&`�T�x��%�������n� ��%(�!�5�҈%x��/ط�'>���0���� ����̓��+�����
�NS�+��]�ȻBU>���2�
�]�F��m!�Nm�q����NÛ�YƦ�m��a��1�˺&ZYΦ��"���[Ů�����0���ITV���6��������d�Ϟxv���TI����~�KV9�v�4��Iz³+v��Z��lm�x]cf���6Z���Z���8��6�*��%��Ey�o��D�<^b��lA ���W�Zǈ�y�lM�{����5��!����1�0�_�먛A��Jv�#����l�w����D93�[p��Wl�`��*	�?�A9'e63�jr��(M��XR�Xq#�v����/�+h�/F�X�vH덯���L��M�*�zG�A�6�m�]�8-tu\)�^��x�NY�q����������B��}:��kt���
v�:���61������-���^Û�؄=Bx�nK��>@�/z9b׍U[�6gB�n��<J��2Cp��U���`�4�K7P�,٩�8Iǟ�@�4_������1�	/�S����%/�9!>���Q
.�L����N�^�c���ѵ'[Y�O���[������� �����_Tև      �   =   x����0Cѳ�0��Mva�9H�"?[ʖo%�q���-?�����x(�ӳ��佀�%
�      �   ;  x�m��rI���S�A� f��i22�$KF[8�ttBuU�P+|�טכ'��nd1�QE��}�w;���h8ǹ%���r㴴&YU7.s$�NM�t�{��~r�+�����������x�6ף���ꫤ��խzď�I���g���;͗n5̇z��\A��ff�h%�ɍT����3@�A��Zc%Q���Ls�͍�z) � !=��2\��g�MU�R%�"iڄ�����s<�)��Q�	.E�s%�U��m-b �J��P��g׆�:c�a��	ZTW1�M�3��p����
_��\�հ�sXX���صk�|fi#���(N�X���7��9��*�W��R�&&n%��(�5�v	ˌ��l��߿��AⒻ�joi����6�:���o����M!��s�-���f�K�2��±A�������d�iw:I���:�Vo���`xr8lt��w�y$,�N�a�V>��{Ll��.o�o�]�������o��ή���G��o��'��_&�O�����~z�Ooo�|�Z��e��w0+dJ��y�	w2�Z3�lJ��<�Gך��G.���F�,8B�)�����jP3�k��c�x��f�����s��2����V��st�()p�(��<(�W���K&8ȉ�H_=��Y$��(e%��]�<>�y
�x��Y����\��GM3TJ��s�e��l�˪ -�ь���ΟI�9:�+�B�7T��j,����ɓ����)!gxפ���Ԙs{�~C��������N��O�ӝR2�ar�)�e�2Rտ���{��ˏ�+�*�ܾN�lR�=m{������Z�F����!;�OO������\��k�yw���Ƽ���e��|�&\���6��lD�5q����wm;dQ;n\5Kc��m���8ATMؐ<�ʉx�wr�|����@|,jB�M�rwuل�l�;�{(��~����Y��`�gj�h.+���O�ɗ;4k�$�U�e���+�!�eN������[��(����2RRɱ[�����K�m��,v�3���F$hI��ޯ##ԍ���+NǍ�ڍF�?��nB     