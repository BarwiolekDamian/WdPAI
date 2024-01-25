--
-- PostgreSQL database dump
--

-- Dumped from database version 10.23 (Ubuntu 10.23-1.pgdg20.04+1)
-- Dumped by pg_dump version 16.0

-- Started on 2024-01-25 14:27:09

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 28 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 5 (class 3079 OID 4235141)
-- Name: btree_gin; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS btree_gin WITH SCHEMA public;


--
-- TOC entry 4295 (class 0 OID 0)
-- Dependencies: 5
-- Name: EXTENSION btree_gin; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION btree_gin IS 'support for indexing common datatypes in GIN';


--
-- TOC entry 6 (class 3079 OID 4235142)
-- Name: btree_gist; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS btree_gist WITH SCHEMA public;


--
-- TOC entry 4296 (class 0 OID 0)
-- Dependencies: 6
-- Name: EXTENSION btree_gist; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION btree_gist IS 'support for indexing common datatypes in GiST';


--
-- TOC entry 7 (class 3079 OID 4235143)
-- Name: citext; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS citext WITH SCHEMA public;


--
-- TOC entry 4297 (class 0 OID 0)
-- Dependencies: 7
-- Name: EXTENSION citext; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION citext IS 'data type for case-insensitive character strings';


--
-- TOC entry 8 (class 3079 OID 4235144)
-- Name: cube; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS cube WITH SCHEMA public;


--
-- TOC entry 4298 (class 0 OID 0)
-- Dependencies: 8
-- Name: EXTENSION cube; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION cube IS 'data type for multidimensional cubes';


--
-- TOC entry 9 (class 3079 OID 4235145)
-- Name: dblink; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dblink WITH SCHEMA public;


--
-- TOC entry 4299 (class 0 OID 0)
-- Dependencies: 9
-- Name: EXTENSION dblink; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dblink IS 'connect to other PostgreSQL databases from within a database';


--
-- TOC entry 2 (class 3079 OID 4235146)
-- Name: dict_int; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dict_int WITH SCHEMA public;


--
-- TOC entry 4300 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION dict_int; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dict_int IS 'text search dictionary template for integers';


--
-- TOC entry 3 (class 3079 OID 4235147)
-- Name: dict_xsyn; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dict_xsyn WITH SCHEMA public;


--
-- TOC entry 4301 (class 0 OID 0)
-- Dependencies: 3
-- Name: EXTENSION dict_xsyn; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dict_xsyn IS 'text search dictionary template for extended synonym processing';


--
-- TOC entry 10 (class 3079 OID 4235148)
-- Name: earthdistance; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS earthdistance WITH SCHEMA public;


--
-- TOC entry 4302 (class 0 OID 0)
-- Dependencies: 10
-- Name: EXTENSION earthdistance; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION earthdistance IS 'calculate great-circle distances on the surface of the Earth';


--
-- TOC entry 11 (class 3079 OID 4235149)
-- Name: fuzzystrmatch; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS fuzzystrmatch WITH SCHEMA public;


--
-- TOC entry 4303 (class 0 OID 0)
-- Dependencies: 11
-- Name: EXTENSION fuzzystrmatch; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION fuzzystrmatch IS 'determine similarities and distance between strings';


--
-- TOC entry 12 (class 3079 OID 4235150)
-- Name: hstore; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS hstore WITH SCHEMA public;


--
-- TOC entry 4304 (class 0 OID 0)
-- Dependencies: 12
-- Name: EXTENSION hstore; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION hstore IS 'data type for storing sets of (key, value) pairs';


--
-- TOC entry 13 (class 3079 OID 4235151)
-- Name: intarray; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS intarray WITH SCHEMA public;


--
-- TOC entry 4305 (class 0 OID 0)
-- Dependencies: 13
-- Name: EXTENSION intarray; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION intarray IS 'functions, operators, and index support for 1-D arrays of integers';


--
-- TOC entry 14 (class 3079 OID 4235152)
-- Name: ltree; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS ltree WITH SCHEMA public;


--
-- TOC entry 4306 (class 0 OID 0)
-- Dependencies: 14
-- Name: EXTENSION ltree; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION ltree IS 'data type for hierarchical tree-like structures';


--
-- TOC entry 15 (class 3079 OID 4235153)
-- Name: pg_stat_statements; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_stat_statements WITH SCHEMA public;


--
-- TOC entry 4307 (class 0 OID 0)
-- Dependencies: 15
-- Name: EXTENSION pg_stat_statements; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_stat_statements IS 'track execution statistics of all SQL statements executed';


--
-- TOC entry 16 (class 3079 OID 4235154)
-- Name: pg_trgm; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_trgm WITH SCHEMA public;


--
-- TOC entry 4308 (class 0 OID 0)
-- Dependencies: 16
-- Name: EXTENSION pg_trgm; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_trgm IS 'text similarity measurement and index searching based on trigrams';


--
-- TOC entry 17 (class 3079 OID 4235155)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 4309 (class 0 OID 0)
-- Dependencies: 17
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


--
-- TOC entry 18 (class 3079 OID 4235156)
-- Name: pgrowlocks; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgrowlocks WITH SCHEMA public;


--
-- TOC entry 4310 (class 0 OID 0)
-- Dependencies: 18
-- Name: EXTENSION pgrowlocks; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgrowlocks IS 'show row-level locking information';


--
-- TOC entry 19 (class 3079 OID 4235157)
-- Name: pgstattuple; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgstattuple WITH SCHEMA public;


--
-- TOC entry 4311 (class 0 OID 0)
-- Dependencies: 19
-- Name: EXTENSION pgstattuple; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgstattuple IS 'show tuple-level statistics';


--
-- TOC entry 4 (class 3079 OID 4235158)
-- Name: tablefunc; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS tablefunc WITH SCHEMA public;


--
-- TOC entry 4312 (class 0 OID 0)
-- Dependencies: 4
-- Name: EXTENSION tablefunc; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION tablefunc IS 'functions that manipulate whole tables, including crosstab';


--
-- TOC entry 20 (class 3079 OID 4235159)
-- Name: unaccent; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS unaccent WITH SCHEMA public;


--
-- TOC entry 4313 (class 0 OID 0)
-- Dependencies: 20
-- Name: EXTENSION unaccent; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION unaccent IS 'text search dictionary that removes accents';


--
-- TOC entry 21 (class 3079 OID 4235160)
-- Name: uuid-ossp; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;


--
-- TOC entry 4314 (class 0 OID 0)
-- Dependencies: 21
-- Name: EXTENSION "uuid-ossp"; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';


--
-- TOC entry 22 (class 3079 OID 4235161)
-- Name: xml2; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS xml2 WITH SCHEMA public;


--
-- TOC entry 4315 (class 0 OID 0)
-- Dependencies: 22
-- Name: EXTENSION xml2; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION xml2 IS 'XPath querying and XSLT';


--
-- TOC entry 928 (class 1255 OID 50454261)
-- Name: add_offer_and_return_id(text, text, text, numeric, integer, integer, integer); Type: FUNCTION; Schema: public; Owner: jalgxydg
--

CREATE FUNCTION public.add_offer_and_return_id(_native_language text, _language text, _description text, _price numeric, _min_level integer, _experience integer, _id_assigned_by integer) RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
    _id INTEGER;
BEGIN
    INSERT INTO offers (native_language, language, description, price, min_level, experience, id_assigned_by)
    VALUES (_native_language, _language, _description, _price, _min_level, _experience, _id_assigned_by)
    RETURNING id INTO _id;

    RETURN _id;
END;
$$;


ALTER FUNCTION public.add_offer_and_return_id(_native_language text, _language text, _description text, _price numeric, _min_level integer, _experience integer, _id_assigned_by integer) OWNER TO jalgxydg;

--
-- TOC entry 929 (class 1255 OID 50454372)
-- Name: add_offer_and_return_id(text, text, text, numeric, text, integer, integer); Type: FUNCTION; Schema: public; Owner: jalgxydg
--

CREATE FUNCTION public.add_offer_and_return_id(_native_language text, _language text, _description text, _price numeric, _min_level text, _experience integer, _id_assigned_by integer) RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
    _id INTEGER;
BEGIN
    INSERT INTO offers (native_language, language, description, price, min_level, experience, id_assigned_by)
    VALUES (_native_language, _language, _description, _price, _min_level, _experience, _id_assigned_by)
    RETURNING id INTO _id;

    RETURN _id;
END;
$$;


ALTER FUNCTION public.add_offer_and_return_id(_native_language text, _language text, _description text, _price numeric, _min_level text, _experience integer, _id_assigned_by integer) OWNER TO jalgxydg;

--
-- TOC entry 930 (class 1255 OID 50454909)
-- Name: update_balance_timestamp(); Type: FUNCTION; Schema: public; Owner: jalgxydg
--

CREATE FUNCTION public.update_balance_timestamp() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    NEW.last_balance_update = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$$;


ALTER FUNCTION public.update_balance_timestamp() OWNER TO jalgxydg;

--
-- TOC entry 931 (class 1255 OID 50454957)
-- Name: update_last_balance_time(); Type: FUNCTION; Schema: public; Owner: jalgxydg
--

CREATE FUNCTION public.update_last_balance_time() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF OLD.balance IS DISTINCT FROM NEW.balance THEN
        NEW.last_balance_update = NOW();
    END IF;
    RETURN NEW;
END;
$$;


ALTER FUNCTION public.update_last_balance_time() OWNER TO jalgxydg;

--
-- TOC entry 2642 (class 2753 OID 4235935)
-- Name: bit_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.bit_ops USING gin;


ALTER OPERATOR FAMILY public.bit_ops USING gin OWNER TO postgres;

--
-- TOC entry 2643 (class 2753 OID 4235947)
-- Name: btree_hstore_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.btree_hstore_ops USING btree;


ALTER OPERATOR FAMILY public.btree_hstore_ops USING btree OWNER TO postgres;

--
-- TOC entry 2644 (class 2753 OID 4235955)
-- Name: bytea_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.bytea_ops USING gin;


ALTER OPERATOR FAMILY public.bytea_ops USING gin OWNER TO postgres;

--
-- TOC entry 2645 (class 2753 OID 4235967)
-- Name: char_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.char_ops USING gin;


ALTER OPERATOR FAMILY public.char_ops USING gin OWNER TO postgres;

--
-- TOC entry 2646 (class 2753 OID 4235979)
-- Name: cidr_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.cidr_ops USING gin;


ALTER OPERATOR FAMILY public.cidr_ops USING gin OWNER TO postgres;

--
-- TOC entry 2647 (class 2753 OID 4235991)
-- Name: citext_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.citext_ops USING btree;


ALTER OPERATOR FAMILY public.citext_ops USING btree OWNER TO postgres;

--
-- TOC entry 2648 (class 2753 OID 4235999)
-- Name: citext_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.citext_ops USING hash;


ALTER OPERATOR FAMILY public.citext_ops USING hash OWNER TO postgres;

--
-- TOC entry 2649 (class 2753 OID 4236003)
-- Name: cube_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.cube_ops USING btree;


ALTER OPERATOR FAMILY public.cube_ops USING btree OWNER TO postgres;

--
-- TOC entry 2650 (class 2753 OID 4236011)
-- Name: date_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.date_ops USING gin;


ALTER OPERATOR FAMILY public.date_ops USING gin OWNER TO postgres;

--
-- TOC entry 2651 (class 2753 OID 4236023)
-- Name: float4_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.float4_ops USING gin;


ALTER OPERATOR FAMILY public.float4_ops USING gin OWNER TO postgres;

--
-- TOC entry 2652 (class 2753 OID 4236035)
-- Name: float8_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.float8_ops USING gin;


ALTER OPERATOR FAMILY public.float8_ops USING gin OWNER TO postgres;

--
-- TOC entry 2653 (class 2753 OID 4236047)
-- Name: gin__int_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gin__int_ops USING gin;


ALTER OPERATOR FAMILY public.gin__int_ops USING gin OWNER TO postgres;

--
-- TOC entry 2654 (class 2753 OID 4236060)
-- Name: gin_hstore_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gin_hstore_ops USING gin;


ALTER OPERATOR FAMILY public.gin_hstore_ops USING gin OWNER TO postgres;

--
-- TOC entry 2656 (class 2753 OID 4236081)
-- Name: gist__int_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gist__int_ops USING gist;


ALTER OPERATOR FAMILY public.gist__int_ops USING gist OWNER TO postgres;

--
-- TOC entry 2657 (class 2753 OID 4236097)
-- Name: gist__intbig_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gist__intbig_ops USING gist;


ALTER OPERATOR FAMILY public.gist__intbig_ops USING gist OWNER TO postgres;

--
-- TOC entry 2658 (class 2753 OID 4236113)
-- Name: gist__ltree_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gist__ltree_ops USING gist;


ALTER OPERATOR FAMILY public.gist__ltree_ops USING gist OWNER TO postgres;

--
-- TOC entry 2664 (class 2753 OID 4236207)
-- Name: gist_cube_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gist_cube_ops USING gist;
ALTER OPERATOR FAMILY public.gist_cube_ops USING gist ADD
    OPERATOR 15 public.~>(public.cube,integer) FOR ORDER BY pg_catalog.float_ops ,
    OPERATOR 16 public.<#>(public.cube,public.cube) FOR ORDER BY pg_catalog.float_ops ,
    OPERATOR 17 public.<->(public.cube,public.cube) FOR ORDER BY pg_catalog.float_ops ,
    OPERATOR 18 public.<=>(public.cube,public.cube) FOR ORDER BY pg_catalog.float_ops ,
    FUNCTION 8 (public.cube, public.cube) public.g_cube_distance(internal,public.cube,smallint,oid,internal);


ALTER OPERATOR FAMILY public.gist_cube_ops USING gist OWNER TO postgres;

--
-- TOC entry 2668 (class 2753 OID 4236273)
-- Name: gist_hstore_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gist_hstore_ops USING gist;


ALTER OPERATOR FAMILY public.gist_hstore_ops USING gist OWNER TO postgres;

--
-- TOC entry 2674 (class 2753 OID 4236370)
-- Name: gist_ltree_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.gist_ltree_ops USING gist;


ALTER OPERATOR FAMILY public.gist_ltree_ops USING gist OWNER TO postgres;

--
-- TOC entry 2685 (class 2753 OID 4236551)
-- Name: hash_hstore_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.hash_hstore_ops USING hash;


ALTER OPERATOR FAMILY public.hash_hstore_ops USING hash OWNER TO postgres;

--
-- TOC entry 2686 (class 2753 OID 4236555)
-- Name: inet_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.inet_ops USING gin;


ALTER OPERATOR FAMILY public.inet_ops USING gin OWNER TO postgres;

--
-- TOC entry 2687 (class 2753 OID 4236567)
-- Name: int2_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.int2_ops USING gin;


ALTER OPERATOR FAMILY public.int2_ops USING gin OWNER TO postgres;

--
-- TOC entry 2688 (class 2753 OID 4236579)
-- Name: int4_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.int4_ops USING gin;


ALTER OPERATOR FAMILY public.int4_ops USING gin OWNER TO postgres;

--
-- TOC entry 2689 (class 2753 OID 4236591)
-- Name: int8_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.int8_ops USING gin;


ALTER OPERATOR FAMILY public.int8_ops USING gin OWNER TO postgres;

--
-- TOC entry 2690 (class 2753 OID 4236603)
-- Name: interval_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.interval_ops USING gin;


ALTER OPERATOR FAMILY public.interval_ops USING gin OWNER TO postgres;

--
-- TOC entry 2691 (class 2753 OID 4236615)
-- Name: ltree_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.ltree_ops USING btree;


ALTER OPERATOR FAMILY public.ltree_ops USING btree OWNER TO postgres;

--
-- TOC entry 2692 (class 2753 OID 4236623)
-- Name: macaddr_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.macaddr_ops USING gin;


ALTER OPERATOR FAMILY public.macaddr_ops USING gin OWNER TO postgres;

--
-- TOC entry 2693 (class 2753 OID 4236635)
-- Name: money_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.money_ops USING gin;


ALTER OPERATOR FAMILY public.money_ops USING gin OWNER TO postgres;

--
-- TOC entry 2694 (class 2753 OID 4236647)
-- Name: numeric_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.numeric_ops USING gin;


ALTER OPERATOR FAMILY public.numeric_ops USING gin OWNER TO postgres;

--
-- TOC entry 2695 (class 2753 OID 4236659)
-- Name: oid_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.oid_ops USING gin;


ALTER OPERATOR FAMILY public.oid_ops USING gin OWNER TO postgres;

--
-- TOC entry 2696 (class 2753 OID 4236671)
-- Name: text_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.text_ops USING gin;


ALTER OPERATOR FAMILY public.text_ops USING gin OWNER TO postgres;

--
-- TOC entry 2697 (class 2753 OID 4236683)
-- Name: time_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.time_ops USING gin;


ALTER OPERATOR FAMILY public.time_ops USING gin OWNER TO postgres;

--
-- TOC entry 2698 (class 2753 OID 4236695)
-- Name: timestamp_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.timestamp_ops USING gin;


ALTER OPERATOR FAMILY public.timestamp_ops USING gin OWNER TO postgres;

--
-- TOC entry 2699 (class 2753 OID 4236707)
-- Name: timestamptz_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.timestamptz_ops USING gin;


ALTER OPERATOR FAMILY public.timestamptz_ops USING gin OWNER TO postgres;

--
-- TOC entry 2700 (class 2753 OID 4236719)
-- Name: timetz_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.timetz_ops USING gin;


ALTER OPERATOR FAMILY public.timetz_ops USING gin OWNER TO postgres;

--
-- TOC entry 2701 (class 2753 OID 4236731)
-- Name: varbit_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.varbit_ops USING gin;


ALTER OPERATOR FAMILY public.varbit_ops USING gin OWNER TO postgres;

--
-- TOC entry 2702 (class 2753 OID 4236743)
-- Name: varchar_ops; Type: OPERATOR FAMILY; Schema: public; Owner: postgres
--

CREATE OPERATOR FAMILY public.varchar_ops USING gin;


ALTER OPERATOR FAMILY public.varchar_ops USING gin OWNER TO postgres;

SET default_tablespace = '';

--
-- TOC entry 225 (class 1259 OID 50266942)
-- Name: offers; Type: TABLE; Schema: public; Owner: jalgxydg
--

CREATE TABLE public.offers (
    id integer NOT NULL,
    native_language character varying(100),
    language character varying(100) NOT NULL,
    description text NOT NULL,
    price numeric NOT NULL,
    min_level character varying(100) NOT NULL,
    "like" integer DEFAULT 0,
    dislike integer DEFAULT 0,
    experience integer DEFAULT 0,
    id_assigned_by integer NOT NULL
);


ALTER TABLE public.offers OWNER TO jalgxydg;

--
-- TOC entry 224 (class 1259 OID 50266940)
-- Name: offers_id_seq; Type: SEQUENCE; Schema: public; Owner: jalgxydg
--

CREATE SEQUENCE public.offers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.offers_id_seq OWNER TO jalgxydg;

--
-- TOC entry 4318 (class 0 OID 0)
-- Dependencies: 224
-- Name: offers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jalgxydg
--

ALTER SEQUENCE public.offers_id_seq OWNED BY public.offers.id;


--
-- TOC entry 223 (class 1259 OID 50266047)
-- Name: users; Type: TABLE; Schema: public; Owner: jalgxydg
--

CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    balance numeric DEFAULT 0,
    id_user_details integer DEFAULT 0 NOT NULL,
    lecturer boolean DEFAULT false,
    last_balance_update timestamp with time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.users OWNER TO jalgxydg;

--
-- TOC entry 228 (class 1259 OID 50266996)
-- Name: users_details; Type: TABLE; Schema: public; Owner: jalgxydg
--

CREATE TABLE public.users_details (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    surname character varying(100) NOT NULL,
    phone character varying(20)
);


ALTER TABLE public.users_details OWNER TO jalgxydg;

--
-- TOC entry 227 (class 1259 OID 50266994)
-- Name: users_details_id_seq; Type: SEQUENCE; Schema: public; Owner: jalgxydg
--

CREATE SEQUENCE public.users_details_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_details_id_seq OWNER TO jalgxydg;

--
-- TOC entry 4319 (class 0 OID 0)
-- Dependencies: 227
-- Name: users_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jalgxydg
--

ALTER SEQUENCE public.users_details_id_seq OWNED BY public.users_details.id;


--
-- TOC entry 222 (class 1259 OID 50266045)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: jalgxydg
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO jalgxydg;

--
-- TOC entry 4320 (class 0 OID 0)
-- Dependencies: 222
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jalgxydg
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 226 (class 1259 OID 50266959)
-- Name: users_offers; Type: TABLE; Schema: public; Owner: jalgxydg
--

CREATE TABLE public.users_offers (
    id_user integer NOT NULL,
    id_offer integer NOT NULL
);


ALTER TABLE public.users_offers OWNER TO jalgxydg;

--
-- TOC entry 4146 (class 2604 OID 50266945)
-- Name: offers id; Type: DEFAULT; Schema: public; Owner: jalgxydg
--

ALTER TABLE ONLY public.offers ALTER COLUMN id SET DEFAULT nextval('public.offers_id_seq'::regclass);


--
-- TOC entry 4141 (class 2604 OID 50266050)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: jalgxydg
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4150 (class 2604 OID 50266999)
-- Name: users_details id; Type: DEFAULT; Schema: public; Owner: jalgxydg
--

ALTER TABLE ONLY public.users_details ALTER COLUMN id SET DEFAULT nextval('public.users_details_id_seq'::regclass);


--
-- TOC entry 4285 (class 0 OID 50266942)
-- Dependencies: 225
-- Data for Name: offers; Type: TABLE DATA; Schema: public; Owner: jalgxydg
--

INSERT INTO public.offers VALUES (30, 'English', 'English', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 35, 'B1', 13, 3, 3, 28);
INSERT INTO public.offers VALUES (31, 'English', 'English', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 50, 'A1', 33, 0, 3, 29);
INSERT INTO public.offers VALUES (32, 'English', 'English', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 75, 'C1', 1, 0, 10, 30);
INSERT INTO public.offers VALUES (33, 'English', 'English', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 60, 'B1', 5, 9, 10, 30);
INSERT INTO public.offers VALUES (34, 'German', 'German', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 55, 'A2', 9, 17, 3, 31);
INSERT INTO public.offers VALUES (35, 'German', 'English', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 35, 'A1', 11, 1, 1, 31);
INSERT INTO public.offers VALUES (36, 'French', 'French', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 110, 'C1', 3, 3, 15, 32);
INSERT INTO public.offers VALUES (37, 'French', 'French', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 90, 'A1', 0, 0, 15, 32);
INSERT INTO public.offers VALUES (38, 'German', 'German', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 40, 'B1', 5, 0, 7, 33);
INSERT INTO public.offers VALUES (39, 'French', 'French', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 75, 'A1', 0, 3, 9, 34);
INSERT INTO public.offers VALUES (40, 'French', 'English', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 40, 'B1', 0, 0, 3, 34);
INSERT INTO public.offers VALUES (41, 'Polish', 'Polish', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 30, 'ANY', 0, 0, 30, 35);
INSERT INTO public.offers VALUES (42, 'Spanish', 'Spanish', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 70, 'ANY', 33, 1, 9, 36);
INSERT INTO public.offers VALUES (43, 'Spanish', 'Portuguese', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit turpis at eros molestie, vel mattis velit euismod.', 35, 'A2', 7, 3, 2, 36);


--
-- TOC entry 4283 (class 0 OID 50266047)
-- Dependencies: 223
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: jalgxydg
--

INSERT INTO public.users VALUES (37, 'jarek.klusa@gmail.com', '$2y$10$oXt./cpHLuCak3gok4GPEO36YjVoUbxnVWciwxAY9E67u/7j.NHf.', 700, 36, false, '2024-01-25 13:07:41.47474+00');
INSERT INTO public.users VALUES (38, 'piotrek.sarnek@gmail.com', '$2y$10$p9Ewu2jV5ASibIK2pB633Oi5RmcFgSnRCTgEbWm5R0dA8Acfp34Ba', 150, 37, false, '2024-01-25 13:08:32.344746+00');
INSERT INTO public.users VALUES (39, 'cristiano.fernandez@gmail.com', '$2y$10$RaE.EB7xW8Q.y2Z3qASR8.47MlGXMYon9uK9HYAunayAJpuF3sQMO', 90, 38, false, '2024-01-25 13:09:32.708173+00');
INSERT INTO public.users VALUES (28, 'damian.nowak@gmail.com', '$2y$10$L9g8Yvw.jjL2eDsOqi7tcOt99gHXG180oLaWyp67JdOO1HnEEcN4K', 100, 27, true, '2024-01-25 12:34:55.748536+00');
INSERT INTO public.users VALUES (29, 'karol.krol@gmail.com', '$2y$10$mRnnpHzSuNiqeoPl2Taxiu5naXJso9WVp5lkTTNQHfZwThMSlSD3K', 300, 28, true, '2024-01-25 12:37:51.653514+00');
INSERT INTO public.users VALUES (30, 'jack.obama@gmail.com', '$2y$10$SbT33BicNTL5UdF0LliPSuJCFQ6C2/FiF0kP4rybZT9kwpACIUqkO', 0, 29, true, '2024-01-25 12:42:36.590017+00');
INSERT INTO public.users VALUES (31, 'emilia.krieger@gmail.com', '$2y$10$tM0YA4VU0/pZchicFpO0WO1mH18b9FiXeJGnnXL6iIWHSrKQ3niM6', 500, 30, true, '2024-01-25 12:45:35.80856+00');
INSERT INTO public.users VALUES (32, 'pascale.brodnicki@gmail.com', '$2y$10$LQAV8pUf8lKpMF9OHASQ3uQIX6lmfOEXh0IosM1Ory.GK83evbkSC', 0, 31, true, '2024-01-25 12:52:36.845564+00');
INSERT INTO public.users VALUES (33, 'matteo.harribo@gmail.com', '$2y$10$e3REZ0LMq7cqnywlnIQaIOG.E4BW.b4DpwlWnx170tBYTOU7yzdfq', 0, 32, true, '2024-01-25 12:55:47.446293+00');
INSERT INTO public.users VALUES (34, 'michele.gessler@gmail.com', '$2y$10$ksUjCIOjOMGmhDwaHljV3Oyp2z.Hy9Prl6QiT8feRFeid6G/GVhS.', 0, 33, true, '2024-01-25 13:00:17.246369+00');
INSERT INTO public.users VALUES (35, 'janusz.wilk@gmail.com', '$2y$10$0SBqyx1IItmo2S4ZwFpiMOVAUqJLNLdrc.XmPBgA9Y3gt8xZFA6YW', 0, 34, true, '2024-01-25 13:02:13.655153+00');
INSERT INTO public.users VALUES (36, 'roman.calva@gmail.com', '$2y$10$1a15h5fd2Ih9tUkb3TG7GOSP3JI1AYbX48pwtgGPuNrIcZBTZYLSG', 350, 35, true, '2024-01-25 13:04:23.493181+00');


--
-- TOC entry 4288 (class 0 OID 50266996)
-- Dependencies: 228
-- Data for Name: users_details; Type: TABLE DATA; Schema: public; Owner: jalgxydg
--

INSERT INTO public.users_details VALUES (27, 'Damian', 'Nowak', '135575971');
INSERT INTO public.users_details VALUES (28, 'Karol', 'Król', '979955355');
INSERT INTO public.users_details VALUES (29, 'Jack', 'Obama', '555757971');
INSERT INTO public.users_details VALUES (30, 'Emilia', 'Krieger', '333555111');
INSERT INTO public.users_details VALUES (31, 'Pascale', 'Brodnicki', '555111333');
INSERT INTO public.users_details VALUES (32, 'Matteo', 'Harribo', '333753135');
INSERT INTO public.users_details VALUES (33, 'Michèle', 'Gessler', '975535795');
INSERT INTO public.users_details VALUES (34, 'Janusz', 'Wilk', '999090797');
INSERT INTO public.users_details VALUES (35, 'Román', 'Calva', '111333555');
INSERT INTO public.users_details VALUES (36, 'Jarek', 'Klusa', '513131570');
INSERT INTO public.users_details VALUES (37, 'Piotrek', 'Sarnek', '999555333');
INSERT INTO public.users_details VALUES (38, 'Cristiano', 'Fernandez', '757777909');


--
-- TOC entry 4286 (class 0 OID 50266959)
-- Dependencies: 226
-- Data for Name: users_offers; Type: TABLE DATA; Schema: public; Owner: jalgxydg
--

INSERT INTO public.users_offers VALUES (28, 30);
INSERT INTO public.users_offers VALUES (29, 31);
INSERT INTO public.users_offers VALUES (30, 32);
INSERT INTO public.users_offers VALUES (30, 33);
INSERT INTO public.users_offers VALUES (31, 34);
INSERT INTO public.users_offers VALUES (31, 35);
INSERT INTO public.users_offers VALUES (32, 36);
INSERT INTO public.users_offers VALUES (32, 37);
INSERT INTO public.users_offers VALUES (33, 38);
INSERT INTO public.users_offers VALUES (34, 39);
INSERT INTO public.users_offers VALUES (34, 40);
INSERT INTO public.users_offers VALUES (35, 41);
INSERT INTO public.users_offers VALUES (36, 42);
INSERT INTO public.users_offers VALUES (36, 43);


--
-- TOC entry 4321 (class 0 OID 0)
-- Dependencies: 224
-- Name: offers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jalgxydg
--

SELECT pg_catalog.setval('public.offers_id_seq', 43, true);


--
-- TOC entry 4322 (class 0 OID 0)
-- Dependencies: 227
-- Name: users_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jalgxydg
--

SELECT pg_catalog.setval('public.users_details_id_seq', 38, true);


--
-- TOC entry 4323 (class 0 OID 0)
-- Dependencies: 222
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: jalgxydg
--

SELECT pg_catalog.setval('public.users_id_seq', 39, true);


--
-- TOC entry 4152 (class 1259 OID 50266952)
-- Name: offers_id_uindex; Type: INDEX; Schema: public; Owner: jalgxydg
--

CREATE UNIQUE INDEX offers_id_uindex ON public.offers USING btree (id);


--
-- TOC entry 4151 (class 1259 OID 50266953)
-- Name: users__uindex; Type: INDEX; Schema: public; Owner: jalgxydg
--

CREATE UNIQUE INDEX users__uindex ON public.users USING btree (id);


--
-- TOC entry 4153 (class 1259 OID 50267000)
-- Name: users_details_id_uindex; Type: INDEX; Schema: public; Owner: jalgxydg
--

CREATE UNIQUE INDEX users_details_id_uindex ON public.users_details USING btree (id);


--
-- TOC entry 4158 (class 2620 OID 50454958)
-- Name: users trg_update_balance_time; Type: TRIGGER; Schema: public; Owner: jalgxydg
--

CREATE TRIGGER trg_update_balance_time BEFORE UPDATE OF balance ON public.users FOR EACH ROW EXECUTE PROCEDURE public.update_last_balance_time();


--
-- TOC entry 4159 (class 2620 OID 50454910)
-- Name: users trigger_update_balance_timestamp; Type: TRIGGER; Schema: public; Owner: jalgxydg
--

CREATE TRIGGER trigger_update_balance_timestamp BEFORE UPDATE OF balance ON public.users FOR EACH ROW EXECUTE PROCEDURE public.update_balance_timestamp();


--
-- TOC entry 4155 (class 2606 OID 50452875)
-- Name: offers offers_users_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: jalgxydg
--

ALTER TABLE ONLY public.offers
    ADD CONSTRAINT offers_users_id_fk FOREIGN KEY (id_assigned_by) REFERENCES public.users(id);


--
-- TOC entry 4156 (class 2606 OID 50266978)
-- Name: users_offers users_offers_offers_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: jalgxydg
--

ALTER TABLE ONLY public.users_offers
    ADD CONSTRAINT users_offers_offers_id_fk FOREIGN KEY (id_offer) REFERENCES public.offers(id);


--
-- TOC entry 4157 (class 2606 OID 50266973)
-- Name: users_offers users_offers_users_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: jalgxydg
--

ALTER TABLE ONLY public.users_offers
    ADD CONSTRAINT users_offers_users_id_fk FOREIGN KEY (id_user) REFERENCES public.users(id);


--
-- TOC entry 4154 (class 2606 OID 50267306)
-- Name: users users_users_details_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: jalgxydg
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_users_details_id_fk FOREIGN KEY (id_user_details) REFERENCES public.users_details(id);


--
-- TOC entry 4294 (class 0 OID 0)
-- Dependencies: 28
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- TOC entry 4316 (class 0 OID 0)
-- Dependencies: 621
-- Name: FUNCTION dblink_connect_u(text); Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON FUNCTION public.dblink_connect_u(text) FROM PUBLIC;


--
-- TOC entry 4317 (class 0 OID 0)
-- Dependencies: 622
-- Name: FUNCTION dblink_connect_u(text, text); Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON FUNCTION public.dblink_connect_u(text, text) FROM PUBLIC;


-- Completed on 2024-01-25 14:27:23

--
-- PostgreSQL database dump complete
--

